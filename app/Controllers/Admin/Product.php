<?php

namespace App\Controllers\Admin;

use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductMediaModel;

/**
 * Admin\Product
 *
 * CRUD controller for managing products with multi-image and video support.
 * PSR-12 compliant. Business logic kept thin; delegates to models.
 */
class Product extends AdminBaseController
{
    protected ProductModel         $productModel;
    protected ProductCategoryModel $categoryModel;
    protected ProductMediaModel    $mediaModel;

    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->categoryModel = new ProductCategoryModel();
        $this->mediaModel    = new ProductMediaModel();
    }

    // ── List ─────────────────────────────────────────────────────────────────

    public function index(): string
    {
        $categoryId = (int) ($this->request->getGet('category_id') ?: 0);

        $builder = $this->productModel->select('products.*, product_categories.title AS category_title')
                                      ->join('product_categories', 'product_categories.id = products.category_id', 'left')
                                      ->orderBy('products.sort_order', 'ASC')
                                      ->orderBy('products.created_at', 'DESC');

        if ($categoryId > 0) {
            $builder->where('products.category_id', $categoryId);
        }

        $products   = $builder->findAll();
        $categories = $this->categoryModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll();

        return view('admin/products/index', [
            'title'              => 'Quản Lý Sản Phẩm',
            'products'           => $products,
            'categories'         => $categories,
            'selectedCategoryId' => $categoryId,
        ]);
    }

    // ── Create ───────────────────────────────────────────────────────────────

    public function create(): string
    {
        $categories = $this->categoryModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll();

        return view('admin/products/create', [
            'title'      => 'Thêm Sản Phẩm Mới',
            'categories' => $categories,
        ]);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[2]|max_length[255]',
            'category_id' => 'required|integer',
            'status'      => 'required|in_list[0,1]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = $this->uniqueSlug($title);

        $specsRaw = $this->buildSpecsJson(
            $this->request->getPost('spec_keys'),
            $this->request->getPost('spec_values')
        );

        $data = [
            'category_id'     => (int) $this->request->getPost('category_id'),
            'title'           => $title,
            'slug'            => $slug,
            'sku'             => $this->request->getPost('sku'),
            'summary'         => $this->request->getPost('summary'),
            'content'         => $this->request->getPost('content'),
            'specs'           => $specsRaw ?: null,
            'price'           => $this->request->getPost('price') ?: null,
            'price_label'     => $this->request->getPost('price_label'),
            'is_featured'     => (int) ($this->request->getPost('is_featured') ?: 0),
            'sort_order'      => (int) ($this->request->getPost('sort_order') ?: 0),
            'status'          => (int) $this->request->getPost('status'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description') ?: $this->request->getPost('summary'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'created_by'      => session()->get('admin_id'),
        ];

        // Cover image
        $cover = $this->request->getFile('cover_image');
        if ($cover && $cover->isValid() && ! $cover->hasMoved()) {
            $coverName       = $cover->getRandomName();
            $cover->move(FCPATH . 'uploads/products', $coverName);
            $data['cover_image'] = 'uploads/products/' . $coverName;
        }

        $productId = $this->productModel->insert($data, true);

        // Additional gallery images (multi-upload)
        $this->storeGalleryImages($productId, $this->request->getFiles());

        // Video URLs
        $this->storeVideoUrls($productId,
            $this->request->getPost('video_urls'),
            $this->request->getPost('video_captions')
        );

        return redirect()->to(base_url('admin/products'))->with('success', 'Đã thêm sản phẩm thành công.');
    }

    // ── Edit ─────────────────────────────────────────────────────────────────

    public function edit(int $id): string
    {
        $product = $this->productModel->find($id);
        if (! $product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $categories = $this->categoryModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll();
        $media      = $this->mediaModel->getByProduct($id);

        // Decode specs JSON → array of key-value pairs
        $specs = [];
        if (! empty($product['specs'])) {
            $decoded = json_decode($product['specs'], true);
            if (is_array($decoded)) {
                foreach ($decoded as $k => $v) {
                    $specs[] = ['key' => $k, 'value' => $v];
                }
            }
        }

        return view('admin/products/edit', [
            'title'      => 'Sửa Sản Phẩm',
            'product'    => $product,
            'categories' => $categories,
            'media'      => $media,
            'specs'      => $specs,
        ]);
    }

    public function update(int $id)
    {
        $product = $this->productModel->find($id);
        if (! $product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Không tìm thấy sản phẩm.');
        }

        $rules = [
            'title'       => 'required|min_length[2]|max_length[255]',
            'category_id' => 'required|integer',
            'status'      => 'required|in_list[0,1]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = ($title !== $product['title']) ? $this->uniqueSlug($title, $id) : $product['slug'];

        $specsRaw = $this->buildSpecsJson(
            $this->request->getPost('spec_keys'),
            $this->request->getPost('spec_values')
        );

        $data = [
            'category_id'     => (int) $this->request->getPost('category_id'),
            'title'           => $title,
            'slug'            => $slug,
            'sku'             => $this->request->getPost('sku'),
            'summary'         => $this->request->getPost('summary'),
            'content'         => $this->request->getPost('content'),
            'specs'           => $specsRaw ?: null,
            'price'           => $this->request->getPost('price') ?: null,
            'price_label'     => $this->request->getPost('price_label'),
            'is_featured'     => (int) ($this->request->getPost('is_featured') ?: 0),
            'sort_order'      => (int) ($this->request->getPost('sort_order') ?: 0),
            'status'          => (int) $this->request->getPost('status'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description') ?: $this->request->getPost('summary'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'updated_by'      => session()->get('admin_id'),
        ];

        // Cover image replacement
        $cover = $this->request->getFile('cover_image');
        if ($cover && $cover->isValid() && ! $cover->hasMoved()) {
            if (! empty($product['cover_image']) && file_exists(FCPATH . $product['cover_image'])) {
                @unlink(FCPATH . $product['cover_image']);
            }
            $coverName       = $cover->getRandomName();
            $cover->move(FCPATH . 'uploads/products', $coverName);
            $data['cover_image'] = 'uploads/products/' . $coverName;
        }

        $this->productModel->update($id, $data);

        // Append new gallery images (existing ones preserved unless deleted via deleteMedia)
        $this->storeGalleryImages($id, $this->request->getFiles());

        // Append new video URLs
        $this->storeVideoUrls($id,
            $this->request->getPost('video_urls'),
            $this->request->getPost('video_captions')
        );

        return redirect()->to(base_url('admin/products'))->with('success', 'Đã cập nhật sản phẩm thành công.');
    }

    // ── Delete ────────────────────────────────────────────────────────────────

    public function delete(int $id)
    {
        $product = $this->productModel->find($id);
        if (! $product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Không tìm thấy sản phẩm.');
        }

        $this->productModel->delete($id);

        return redirect()->to(base_url('admin/products'))->with('success', 'Đã xóa sản phẩm thành công.');
    }

    // ── Delete single media (AJAX) ────────────────────────────────────────────

    public function deleteMedia(int $mediaId)
    {
        $media = $this->mediaModel->find($mediaId);
        if (! $media) {
            return $this->response->setJSON(['success' => false, 'message' => 'Không tìm thấy media.']);
        }

        // Delete physical file
        if ($media['type'] === 'image' && ! empty($media['file_path']) && file_exists(FCPATH . $media['file_path'])) {
            @unlink(FCPATH . $media['file_path']);
        }

        $this->mediaModel->delete($mediaId);

        return $this->response->setJSON(['success' => true]);
    }

    // ── Private Helpers ────────────────────────────────────────────────────────

    /**
     * Build JSON string from parallel spec_keys and spec_values arrays.
     */
    private function buildSpecsJson(?array $keys, ?array $values): ?string
    {
        if (empty($keys) || empty($values)) {
            return null;
        }

        $specs = [];
        foreach ($keys as $i => $key) {
            $key = trim($key);
            if ($key !== '') {
                $specs[$key] = trim($values[$i] ?? '');
            }
        }

        return ! empty($specs) ? json_encode($specs, JSON_UNESCAPED_UNICODE) : null;
    }

    /**
     * Store multiple gallery image uploads.
     */
    private function storeGalleryImages(int $productId, array $files): void
    {
        if (empty($files['gallery_images'])) {
            return;
        }

        $images = $files['gallery_images'];
        if (! is_array($images)) {
            $images = [$images];
        }

        $sortStart = $this->mediaModel->where('product_id', $productId)->countAllResults();

        foreach ($images as $idx => $img) {
            if (! ($img instanceof \CodeIgniter\HTTP\Files\UploadedFile)) {
                continue;
            }
            if (! $img->isValid() || $img->hasMoved()) {
                continue;
            }
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/products/gallery', $newName);

            $this->mediaModel->insert([
                'product_id' => $productId,
                'type'       => 'image',
                'file_path'  => 'uploads/products/gallery/' . $newName,
                'caption'    => '',
                'sort_order' => $sortStart + $idx,
            ]);
        }
    }

    /**
     * Store video URL entries.
     */
    private function storeVideoUrls(int $productId, ?array $urls, ?array $captions): void
    {
        if (empty($urls)) {
            return;
        }

        $sortStart = $this->mediaModel->where('product_id', $productId)->where('type', 'video')->countAllResults();

        foreach ($urls as $idx => $url) {
            $url = trim($url);
            if ($url === '') {
                continue;
            }
            $this->mediaModel->insert([
                'product_id' => $productId,
                'type'       => 'video',
                'video_url'  => $url,
                'caption'    => trim($captions[$idx] ?? ''),
                'sort_order' => $sortStart + $idx,
            ]);
        }
    }

    /**
     * Generate a unique slug, excluding a given ID on update.
     */
    private function uniqueSlug(string $title, int $excludeId = 0): string
    {
        $slug  = mb_url_title($title, '-', true);
        $query = $this->productModel->where('slug', $slug);
        if ($excludeId > 0) {
            $query->where('id !=', $excludeId);
        }
        if ($query->countAllResults() > 0) {
            $slug .= '-' . time();
        }
        return $slug;
    }
}
