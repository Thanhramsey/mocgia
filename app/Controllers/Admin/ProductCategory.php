<?php

namespace App\Controllers\Admin;

use App\Models\ProductCategoryModel;

/**
 * Admin\ProductCategory
 *
 * CRUD controller for managing product groups (categories).
 * PSR-12 compliant. Business logic kept thin; delegates to model.
 */
class ProductCategory extends AdminBaseController
{
    protected ProductCategoryModel $model;

    public function __construct()
    {
        $this->model = new ProductCategoryModel();
    }

    // ── List ─────────────────────────────────────────────────────────────────

    public function index(): string
    {
        $categories = $this->model->orderBy('sort_order', 'ASC')->findAll();

        return view('admin/product_categories/index', [
            'title'      => 'Quản Lý Nhóm Sản Phẩm',
            'categories' => $categories,
        ]);
    }

    // ── Create ───────────────────────────────────────────────────────────────

    public function create(): string
    {
        $parents = $this->model->where('status', 1)->where('parent_id IS NULL')->orderBy('sort_order', 'ASC')->findAll();

        return view('admin/product_categories/create', [
            'title'   => 'Thêm Nhóm Sản Phẩm',
            'parents' => $parents,
        ]);
    }

    public function store()
    {
        $rules = [
            'title'  => 'required|min_length[2]|max_length[255]',
            'status' => 'required|in_list[0,1]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = $this->uniqueSlug($title);

        $data = [
            'parent_id'       => $this->request->getPost('parent_id') ?: null,
            'title'           => $title,
            'slug'            => $slug,
            'description'     => $this->request->getPost('description'),
            'icon'            => $this->request->getPost('icon') ?: 'bi-box-seam',
            'sort_order'      => (int) ($this->request->getPost('sort_order') ?: 0),
            'status'          => (int) $this->request->getPost('status'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'created_by'      => session()->get('admin_id'),
        ];

        // Cover image upload
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $newName    = $img->getRandomName();
            $img->move(FCPATH . 'uploads/product_categories', $newName);
            $data['image'] = 'uploads/product_categories/' . $newName;
        }

        $this->model->insert($data);

        return redirect()->to(base_url('admin/product-categories'))->with('success', 'Đã thêm nhóm sản phẩm thành công.');
    }

    // ── Edit ─────────────────────────────────────────────────────────────────

    public function edit(int $id): string
    {
        $category = $this->model->find($id);
        if (! $category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $parents = $this->model->where('status', 1)
                               ->where('parent_id IS NULL')
                               ->where('id !=', $id)
                               ->orderBy('sort_order', 'ASC')
                               ->findAll();

        return view('admin/product_categories/edit', [
            'title'    => 'Sửa Nhóm Sản Phẩm',
            'category' => $category,
            'parents'  => $parents,
        ]);
    }

    public function update(int $id)
    {
        $category = $this->model->find($id);
        if (! $category) {
            return redirect()->to(base_url('admin/product-categories'))->with('error', 'Không tìm thấy nhóm sản phẩm.');
        }

        $rules = [
            'title'  => 'required|min_length[2]|max_length[255]',
            'status' => 'required|in_list[0,1]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = ($title !== $category['title']) ? $this->uniqueSlug($title, $id) : $category['slug'];

        $data = [
            'parent_id'       => $this->request->getPost('parent_id') ?: null,
            'title'           => $title,
            'slug'            => $slug,
            'description'     => $this->request->getPost('description'),
            'icon'            => $this->request->getPost('icon') ?: 'bi-box-seam',
            'sort_order'      => (int) ($this->request->getPost('sort_order') ?: 0),
            'status'          => (int) $this->request->getPost('status'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'updated_by'      => session()->get('admin_id'),
        ];

        // Cover image upload
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            // Remove old image
            if (! empty($category['image']) && file_exists(FCPATH . $category['image'])) {
                @unlink(FCPATH . $category['image']);
            }
            $newName    = $img->getRandomName();
            $img->move(FCPATH . 'uploads/product_categories', $newName);
            $data['image'] = 'uploads/product_categories/' . $newName;
        }

        $this->model->update($id, $data);

        return redirect()->to(base_url('admin/product-categories'))->with('success', 'Đã cập nhật nhóm sản phẩm thành công.');
    }

    // ── Delete ────────────────────────────────────────────────────────────────

    public function delete(int $id)
    {
        $category = $this->model->find($id);
        if (! $category) {
            return redirect()->to(base_url('admin/product-categories'))->with('error', 'Không tìm thấy nhóm sản phẩm.');
        }

        $this->model->delete($id);

        return redirect()->to(base_url('admin/product-categories'))->with('success', 'Đã xóa nhóm sản phẩm.');
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    private function uniqueSlug(string $title, int $excludeId = 0): string
    {
        $slug  = mb_url_title($title, '-', true);
        $query = $this->model->where('slug', $slug);
        if ($excludeId > 0) {
            $query->where('id !=', $excludeId);
        }
        if ($query->countAllResults() > 0) {
            $slug .= '-' . time();
        }
        return $slug;
    }
}
