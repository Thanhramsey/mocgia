<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * ProductCategoryModel
 *
 * Handles CRUD for the product_categories table.
 * Supports soft deletes, timestamps, and parent/child category hierarchies.
 */
class ProductCategoryModel extends Model
{
    protected $table            = 'product_categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'parent_id', 'title', 'slug', 'description', 'image', 'icon',
        'sort_order', 'status',
        'seo_title', 'seo_description', 'seo_keywords',
        'created_by', 'updated_by',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * Return all active root-level categories with their product count.
     */
    public function getActiveCategories(): array
    {
        $categories = $this->select('product_categories.*, COUNT(products.id) as product_count')
                           ->join('products', 'products.category_id = product_categories.id AND products.deleted_at IS NULL AND products.status = 1', 'left')
                           ->where('product_categories.status', 1)
                           ->groupBy('product_categories.id')
                           ->orderBy('product_categories.sort_order', 'ASC')
                           ->findAll();

        // Accumulate subcategory product counts into parents
        $childCounts = [];
        foreach ($categories as $cat) {
            if (! empty($cat['parent_id']) && $cat['parent_id'] > 0) {
                if (! isset($childCounts[$cat['parent_id']])) {
                    $childCounts[$cat['parent_id']] = 0;
                }
                $childCounts[$cat['parent_id']] += (int) $cat['product_count'];
            }
        }

        foreach ($categories as &$cat) {
            if (isset($childCounts[$cat['id']])) {
                $cat['product_count'] = (int) $cat['product_count'] + $childCounts[$cat['id']];
            }
        }

        return $categories;
    }

    /**
     * Return one category by its slug (active only).
     */
    public function getBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)->where('status', 1)->first();
    }
}
