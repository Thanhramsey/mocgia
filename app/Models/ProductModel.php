<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * ProductModel
 *
 * Handles CRUD for the products table.
 * Supports soft deletes, timestamps, category join, and featured/status filtering.
 */
class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id', 'title', 'slug', 'sku', 'summary', 'content',
        'specs', 'price', 'price_label', 'cover_image',
        'is_featured', 'sort_order', 'status',
        'seo_title', 'seo_description', 'seo_keywords',
        'created_by', 'updated_by',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * Return all active products with their category name.
     */
    public function getProductsWithCategory(?int $categoryId = null, int $limit = 0): array
    {
        $builder = $this->select('products.*, product_categories.title AS category_title, product_categories.slug AS category_slug')
                        ->join('product_categories', 'product_categories.id = products.category_id', 'left')
                        ->where('products.status', 1)
                        ->orderBy('products.sort_order', 'ASC')
                        ->orderBy('products.created_at', 'DESC');

        if ($categoryId !== null) {
            $builder->where('products.category_id', $categoryId);
        }

        if ($limit > 0) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }

    /**
     * Return a single product by slug with its category info.
     */
    public function getBySlugWithCategory(string $slug): ?array
    {
        return $this->select('products.*, product_categories.title AS category_title, product_categories.slug AS category_slug')
                    ->join('product_categories', 'product_categories.id = products.category_id', 'left')
                    ->where('products.slug', $slug)
                    ->where('products.status', 1)
                    ->first();
    }

    /**
     * Return featured products for homepage display.
     */
    public function getFeatured(int $limit = 6): array
    {
        return $this->select('products.*, product_categories.title AS category_title')
                    ->join('product_categories', 'product_categories.id = products.category_id', 'left')
                    ->where('products.status', 1)
                    ->where('products.is_featured', 1)
                    ->orderBy('products.sort_order', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Return related products from the same category.
     */
    public function getRelated(int $categoryId, int $excludeId, int $limit = 4): array
    {
        return $this->select('products.*, product_categories.title AS category_title')
                    ->join('product_categories', 'product_categories.id = products.category_id', 'left')
                    ->where('products.status', 1)
                    ->where('products.category_id', $categoryId)
                    ->where('products.id !=', $excludeId)
                    ->orderBy('products.sort_order', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }
}
