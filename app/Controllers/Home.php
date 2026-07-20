<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\CertificateModel;
use App\Models\DocumentCategoryModel;
use App\Models\ServiceModel;
use App\Models\GalleryModel;
use App\Models\NewsModel;
use App\Models\PartnerModel;

class Home extends BaseController
{
    public function index()
    {
        if ($this->request->getGet('reseed') === '1') {
            $db = \Config\Database::connect();
            $db->query('SET FOREIGN_KEY_CHECKS = 0');
            $tables = ['users', 'settings', 'services', 'banners', 'news', 'news_categories', 'partners', 'company_milestones'];
            foreach ($tables as $table) {
                if ($db->tableExists($table)) {
                    $db->table($table)->truncate();
                }
            }
            $db->query('SET FOREIGN_KEY_CHECKS = 1');

            $seeder = \Config\Database::seeder();
            $seeder->call('App\Database\Seeds\InitialSeeder');

            return redirect()->to(base_url())->with('success', 'Database successfully re-seeded with Ngân Gia Nguyễn premium dataset!');
        }

        // Create product tables if they don't exist
        if ($this->request->getGet('migrate_products') === '1') {
            $db    = \Config\Database::connect();
            $forge = \Config\Database::forge();

            if (! $db->tableExists('product_categories')) {
                $forge->addField([
                    'id'              => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                    'parent_id'       => ['type' => 'INT', 'unsigned' => true, 'null' => true, 'default' => null],
                    'title'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
                    'slug'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
                    'description'     => ['type' => 'TEXT', 'null' => true],
                    'image'           => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
                    'icon'            => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true, 'default' => 'bi-box-seam'],
                    'sort_order'      => ['type' => 'TINYINT', 'unsigned' => true, 'default' => 0],
                    'status'          => ['type' => 'TINYINT', 'unsigned' => true, 'default' => 1],
                    'seo_title'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                    'seo_description' => ['type' => 'TEXT', 'null' => true],
                    'seo_keywords'    => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
                    'created_at'      => ['type' => 'DATETIME', 'null' => true],
                    'updated_at'      => ['type' => 'DATETIME', 'null' => true],
                    'deleted_at'      => ['type' => 'DATETIME', 'null' => true],
                    'created_by'      => ['type' => 'INT', 'null' => true],
                    'updated_by'      => ['type' => 'INT', 'null' => true],
                ]);
                $forge->addKey('id', true);
                $forge->createTable('product_categories');
            }

            if (! $db->tableExists('products')) {
                $forge->addField([
                    'id'              => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                    'category_id'     => ['type' => 'INT', 'unsigned' => true, 'null' => true, 'default' => null],
                    'title'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
                    'slug'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
                    'sku'             => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
                    'summary'         => ['type' => 'TEXT', 'null' => true],
                    'content'         => ['type' => 'LONGTEXT', 'null' => true],
                    'specs'           => ['type' => 'JSON', 'null' => true],
                    'price'           => ['type' => 'DECIMAL', 'constraint' => '18,2', 'null' => true, 'default' => null],
                    'price_label'     => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
                    'cover_image'     => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
                    'is_featured'     => ['type' => 'TINYINT', 'unsigned' => true, 'default' => 0],
                    'sort_order'      => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
                    'status'          => ['type' => 'TINYINT', 'unsigned' => true, 'default' => 1],
                    'seo_title'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                    'seo_description' => ['type' => 'TEXT', 'null' => true],
                    'seo_keywords'    => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
                    'created_at'      => ['type' => 'DATETIME', 'null' => true],
                    'updated_at'      => ['type' => 'DATETIME', 'null' => true],
                    'deleted_at'      => ['type' => 'DATETIME', 'null' => true],
                    'created_by'      => ['type' => 'INT', 'null' => true],
                    'updated_by'      => ['type' => 'INT', 'null' => true],
                ]);
                $forge->addKey('id', true);
                $forge->createTable('products');
            }

            if (! $db->tableExists('product_media')) {
                $forge->addField([
                    'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
                    'product_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
                    'type'       => ['type' => 'ENUM', 'constraint' => ['image', 'video'], 'default' => 'image'],
                    'file_path'  => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
                    'video_url'  => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
                    'caption'    => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                    'sort_order' => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
                    'created_at' => ['type' => 'DATETIME', 'null' => true],
                    'updated_at' => ['type' => 'DATETIME', 'null' => true],
                ]);
                $forge->addKey('id', true);
                $forge->createTable('product_media');
            }

            return redirect()->to(base_url())->with('success', 'Product tables created/verified successfully!');
        }

        $bannerModel = new BannerModel();
        $serviceModel = new ServiceModel();
        $galleryModel = new GalleryModel();
        $newsModel = new NewsModel();
        $partnerModel = new PartnerModel();
        $certificateModel = new CertificateModel();
        $documentCategoryModel = new DocumentCategoryModel();

        $certificateItems = [];
        try {
            $certificateCategory = $documentCategoryModel
                ->where('slug', 'giay-chung-nhan')
                ->where('status', 1)
                ->first();

            if ($certificateCategory) {
                $certificateItems = $certificateModel
                    ->where('category_id', (int) $certificateCategory['id'])
                    ->where('status', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->limit(8)
                    ->findAll();
            }
        } catch (\Throwable $e) {
            $certificateItems = [];
        }

        $data = [
            'banners'  => $bannerModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll(),
            'services' => $serviceModel->where('status', 1)->findAll(),
            'gallery'  => $galleryModel->where('status', 1)->orderBy('sort_order', 'ASC')->limit(6)->findAll(),
            'news'     => $newsModel->where('status', 'published')->orderBy('published_at', 'DESC')->limit(3)->findAll(),
            'partners' => $partnerModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll(),
            'certificates' => $certificateItems,
        ];

        return view('home/index', $data);
    }
}
