<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * ProductMediaModel
 *
 * Handles CRUD for the product_media table.
 * Stores both images (file uploads) and video URLs (YouTube/Vimeo embed links).
 */
class ProductMediaModel extends Model
{
    protected $table            = 'product_media';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'product_id', 'type', 'file_path', 'video_url', 'caption', 'sort_order',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Return all media items for a product, ordered by sort_order.
     */
    public function getByProduct(int $productId): array
    {
        return $this->where('product_id', $productId)
                    ->orderBy('sort_order', 'ASC')
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }

    /**
     * Return only images for a product.
     */
    public function getImages(int $productId): array
    {
        return $this->where('product_id', $productId)
                    ->where('type', 'image')
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }

    /**
     * Return only videos for a product.
     */
    public function getVideos(int $productId): array
    {
        return $this->where('product_id', $productId)
                    ->where('type', 'video')
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }

    /**
     * Delete all media for a given product.
     * Physical file deletion must be handled in the controller/service.
     */
    public function deleteByProduct(int $productId): void
    {
        $this->where('product_id', $productId)->delete();
    }
}
