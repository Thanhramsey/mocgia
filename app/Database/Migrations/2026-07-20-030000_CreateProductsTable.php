<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        // ── product_categories ──────────────────────────────────────────────────
        $this->forge->addField([
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
        $this->forge->addKey('id', true);
        $this->forge->addKey('slug');
        $this->forge->addKey('status');
        $this->forge->createTable('product_categories');

        // ── products ────────────────────────────────────────────────────────────
        $this->forge->addField([
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
        $this->forge->addKey('id', true);
        $this->forge->addKey('slug');
        $this->forge->addKey('category_id');
        $this->forge->addKey('status');
        $this->forge->createTable('products');

        // ── product_media ────────────────────────────────────────────────────────
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'product_id'  => ['type' => 'INT', 'unsigned' => true, 'null' => false],
            'type'        => ['type' => 'ENUM', 'constraint' => ['image', 'video'], 'default' => 'image'],
            'file_path'   => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'video_url'   => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'caption'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'sort_order'  => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('product_id');
        $this->forge->createTable('product_media');
    }

    public function down(): void
    {
        $this->forge->dropTable('product_media', true);
        $this->forge->dropTable('products', true);
        $this->forge->dropTable('product_categories', true);
    }
}
