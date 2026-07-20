<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductMediaModel;

/**
 * Product (Frontend)
 *
 * Handles frontend product listing and detail pages.
 * PSR-12 compliant.
 */
class Product extends BaseController
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

    // ── Product Listing ───────────────────────────────────────────────────────

    /**
     * Display product listing optionally filtered by category slug.
     */
    public function index(?string $categorySlug = null): string
    {
        $categories  = $this->categoryModel->getActiveCategories();
        $activeCategory = null;

        if ($categorySlug) {
            $activeCategory = $this->categoryModel->getBySlug($categorySlug);
            if (! $activeCategory) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

        $categoryId = $activeCategory ? (int) $activeCategory['id'] : null;
        $categoryIds = null;
        if ($categoryId !== null) {
            $categoryIds = [$categoryId];
            $subCategories = $this->categoryModel->where('parent_id', $categoryId)->where('status', 1)->findAll();
            foreach ($subCategories as $sub) {
                $categoryIds[] = (int) $sub['id'];
            }
        }
        $products   = $this->productModel->getProductsWithCategory($categoryIds);

        $seoTitle = $activeCategory
            ? ($activeCategory['seo_title'] ?: $activeCategory['title'] . ' - ' . get_setting('company_name', 'Ngân Gia Nguyễn'))
            : get_setting('seo_title', 'Sản Phẩm - Ngân Gia Nguyễn');

        return view('products/index', [
            'products'       => $products,
            'categories'     => $categories,
            'activeCategory' => $activeCategory,
            'seo_title'      => $seoTitle,
            'seo_description'=> $activeCategory['seo_description'] ?? get_setting('seo_description', ''),
            'seo_keywords'   => $activeCategory['seo_keywords']    ?? get_setting('seo_keywords', ''),
        ]);
    }

    // ── Product Detail ────────────────────────────────────────────────────────

    /**
     * Display a single product by slug.
     */
    public function show(string $slug): string
    {
        $product = $this->productModel->getBySlugWithCategory($slug);

        if (! $product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $media   = $this->mediaModel->getByProduct((int) $product['id']);
        $related = [];

        if (! empty($product['category_id'])) {
            $related = $this->productModel->getRelated(
                (int) $product['category_id'],
                (int) $product['id'],
                4
            );
        }

        // Decode specs
        $specs = [];
        if (! empty($product['specs'])) {
            $decoded = json_decode($product['specs'], true);
            if (is_array($decoded)) {
                $specs = $decoded;
            }
        }

        // Separate images and videos
        $images = array_filter($media, fn ($m) => $m['type'] === 'image');
        $videos = array_filter($media, fn ($m) => $m['type'] === 'video');

        return view('products/show', [
            'product'         => $product,
            'specs'           => $specs,
            'images'          => array_values($images),
            'videos'          => array_values($videos),
            'related'         => $related,
            'seo_title'       => $product['seo_title']       ?: $product['title'] . ' - ' . get_setting('company_name', 'Ngân Gia Nguyễn'),
            'seo_description' => $product['seo_description'] ?: $product['summary'],
            'seo_keywords'    => $product['seo_keywords']    ?: '',
        ]);
    }
}
