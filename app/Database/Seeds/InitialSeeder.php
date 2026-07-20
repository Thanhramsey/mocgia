<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // 1. Seed Users
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
        $userData = [
            'username'   => 'admin',
            'email'      => 'admin@mocgiawood.com',
            'password'   => $adminPassword,
            'fullname'   => 'Quản trị viên Ngân Gia Nguyễn',
            'role'       => 'superadmin',
            'status'     => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $this->db->table('users')->insert($userData);

        // 2. Seed Settings
        $settings = [
            ['key' => 'company_name', 'value' => 'CÔNG TY CỔ PHẦN GỖ NGÂN GIA NGUYỄN'],
            ['key' => 'company_name_en', 'value' => 'MOC GIA WOOD JOINT STOCK COMPANY'],
            ['key' => 'address', 'value' => '128 Nguyễn Văn Trỗi, Phường 8, Quận Phú Nhuận, TP. Hồ Chí Minh, Việt Nam'],
            ['key' => 'phone', 'value' => '1900.5858.92'],
            ['key' => 'email', 'value' => 'info@mocgiawood.com'],
            ['key' => 'map_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.231987515155!2d106.6775191!3d10.7935405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528cb2c6d4825%3A0xe5a36398d5c414!2s128%20Nguy%E1%BB%85n%20V%C4%83n%20Tr%E1%BB%97i%2C%20Ph%C6%B0%E1%BB%9Dng%208%2C%20Ph%C3%BA%20Nhu%E1%BA%ADn%2C%20Th%C3%A0nh%20ph%E1%BB%91%20H%E1%BB%93%20Ch%C3%AD%20Minh!5e0!3m2!1svi!2s!4v1720668000000!5m2!1svi!2s'],
            ['key' => 'seo_title', 'value' => 'Ngân Gia Nguyễn - Giải pháp vật liệu gỗ công nghiệp & nội thất cao cấp'],
            ['key' => 'seo_description', 'value' => 'Ngân Gia Nguyễn chuyên cung cấp ván gỗ công nghiệp cao cấp, MDF phủ Melamine, Acrylic, Laminate đạt tiêu chuẩn châu Âu và dịch vụ thi công nội thất may đo đẳng cấp.'],
            ['key' => 'seo_keywords', 'value' => 'go cong nghiep moc gia, mdf moc gia, melamine moc gia, noi that may do, thiet ke noi that'],
            ['key' => 'facebook', 'value' => 'https://facebook.com/mocgiawood'],
            ['key' => 'zalo', 'value' => '1900585892'],
            ['key' => 'working_hours', 'value' => '8:00 - 18:00 (Thứ 2 - Thứ 7)'],
            ['key' => 'theme_color_preset', 'value' => 'mocgia'],
            ['key' => 'theme_font_preset', 'value' => 'mocgia_font'],
            ['key' => 'theme_border_radius_btn', 'value' => '4px'],
            ['key' => 'theme_border_radius_block', 'value' => '8px'],
        ];

        foreach ($settings as $setting) {
            $setting['created_at'] = $now;
            $setting['updated_at'] = $now;
            $this->db->table('settings')->insert($setting);
        }

        // 3. Seed Services
        $services = [
            [
                'title'           => 'Vật Liệu & Giải Pháp Gỗ Công Nghiệp',
                'slug'            => 'vat-lieu-va-giai-phap-go-cong-nghiep',
                'summary'         => 'Cung cấp ván gỗ công nghiệp chất lượng cao, MFC, MDF phủ Melamine, Laminate, Acrylic đa dạng màu sắc và bề mặt đạt tiêu chuẩn xuất khẩu.',
                'content'         => '<p>Ngân Gia Nguyễn tự hào là đơn vị tiên phong cung cấp vật liệu gỗ công nghiệp cao cấp tại thị trường Việt Nam. Chúng tôi sở hữu danh mục sản phẩm đa dạng với hơn 1.000 màu sắc và bề mặt khác nhau, từ vân gỗ tự nhiên, vân đá, giả da đến các bề mặt đơn sắc sang trọng.</p><p>Các dòng sản phẩm ván MFC, MDF, HDF của Ngân Gia Nguyễn đều đạt tiêu chuẩn quốc tế E1, E0 về nồng độ phát thải Formaldehyde, đảm bảo an toàn tuyệt đối cho sức khỏe người tiêu dùng và độ bền vượt trội theo thời gian.</p>',
                'image'           => 'wood_materials.webp',
                'icon'            => 'bi-grid-1x2-fill',
                'seo_title'       => 'Vật Liệu Gỗ Công Nghiệp MFC MDF HDF E0 E1 - Ngân Gia Nguyễn',
                'seo_description' => 'Ngân Gia Nguyễn cung cấp gỗ công nghiệp chất lượng cao đạt chuẩn châu Âu E0, E1. Hơn 1000 màu sắc bề mặt vân gỗ, melamine, acrylic bóng gương, laminate chống trầy.',
                'seo_keywords'    => 'go cong nghiep mdf, van go melamine, tam acrylic, laminate go mọc gia',
                'status'          => 1,
            ],
            [
                'title'           => 'Nội Thất May Đo & Giải Pháp Thiết Kế (Bespoke)',
                'slug'            => 'noi-that-may-do-va-giai-phap-thiet-ke',
                'summary'         => 'Thiết kế và sản xuất nội thất gia đình, căn hộ, biệt thự và văn phòng theo yêu cầu riêng biệt, mang lại tính độc bản và tối ưu hóa công năng.',
                'content'         => '<p>Không chỉ dừng lại ở cung cấp vật liệu, Ngân Gia Nguyễn mang đến giải pháp thiết kế và thi công nội thất may đo độc bản (bespoke). Chúng tôi thấu hiểu mỗi không gian sống là một câu chuyện riêng của gia chủ, vì thế đội ngũ kiến trúc sư của Ngân Gia Nguyễn luôn sáng tạo để tạo nên các tác phẩm nội thất hoàn hảo nhất.</p><p>Nhờ dây chuyền sản xuất hiện đại và quy trình kiểm soát chất lượng chặt chẽ, sản phẩm nội thất may đo của Ngân Gia Nguyễn đạt độ tinh xảo cao, đường nét sắc sảo và độ hoàn thiện tinh tế chuẩn châu Âu.</p>',
                'image'           => 'bespoke_furniture.webp',
                'icon'            => 'bi-palette-fill',
                'seo_title'       => 'Thiết kế thi công nội thất may đo Bespoke cao cấp - Ngân Gia Nguyễn',
                'seo_description' => 'Giải pháp thiết kế và sản xuất đồ gỗ nội thất gia đình, tủ bếp, tủ áo, giường ngủ may đo chuẩn xác theo yêu cầu khách hàng cá nhân.',
                'seo_keywords'    => 'noi that may do, noi that bespoke, thiet ke noi that cao cap, tu bep mdf moc gia',
                'status'          => 1,
            ],
            [
                'title'           => 'Thi Thi Công Dự Án Trọn Gói',
                'slug'            => 'thi-cong-du-an-tron-goi',
                'summary'         => 'Nhà thầu thi công lắp đặt hoàn thiện nội thất trọn gói cho biệt thự, căn hộ cao cấp, văn phòng và các dự án thương mại quy mô lớn.',
                'content'         => '<p>Ngân Gia Nguyễn là đối tác tin cậy của các chủ đầu tư, tập đoàn bất động sản lớn tại Việt Nam trong lĩnh vực thi công hoàn thiện nội thất dự án. Với quy mô xưởng sản xuất lớn và đội ngũ thợ lành nghề, chúng tôi tự tin đảm nhận các dự án có độ khó kỹ thuật cao.</p><p>Chúng tôi cam kết tiến độ thi công chính xác, chất lượng vật liệu bàn giao đúng cam kết hợp đồng và dịch vụ bảo hành, bảo trì chuyên nghiệp, kịp thời.</p>',
                'image'           => 'project_construction.webp',
                'icon'            => 'bi-tools',
                'seo_title'       => 'Nhà thầu thi công nội thất dự án căn hộ biệt thự - Ngân Gia Nguyễn',
                'seo_description' => 'Ngân Gia Nguyễn nhận thi công lắp đặt nội thất trọn gói cho các dự án biệt thự, chung cư cao cấp, văn phòng làm việc quy mô lớn chuyên nghiệp.',
                'seo_keywords'    => 'thi cong noi that tron goi, thau noi that van phong, lap dat do go du an',
                'status'          => 1,
            ],
        ];

        foreach ($services as $service) {
            $service['created_at'] = $now;
            $service['updated_at'] = $now;
            $this->db->table('services')->insert($service);
        }

        // 4. Seed Banners
        $banners = [
            [
                'title'         => 'NGÂN GIA NGUYỄN — GIẢI PHÁP VẬT LIỆU GỖ CAO CẤP',
                'subtitle'      => 'Sản phẩm cốt ván chống ẩm đạt chuẩn an toàn sức khỏe quốc tế E0, E1',
                'desktop_image' => 'banner_wood.webp',
                'mobile_image'  => 'banner_wood_mb.webp',
                'button_text'   => 'Khám phá giải pháp',
                'button_link'   => '#services',
                'sort_order'    => 1,
                'status'        => 1,
            ],
            [
                'title'         => 'KIẾN TẠO KHÔNG GIAN NỘI THẤT MAY ĐO',
                'subtitle'      => 'Hơn 1.000 màu sắc và bề mặt vân gỗ thời thượng dẫn đầu xu hướng thiết kế',
                'desktop_image' => 'banner_interior.webp',
                'mobile_image'  => 'banner_interior_mb.webp',
                'button_text'   => 'Liên hệ tư vấn',
                'button_link'   => '#contact',
                'sort_order'    => 2,
                'status'        => 1,
            ],
        ];

        foreach ($banners as $banner) {
            $banner['created_at'] = $now;
            $banner['updated_at'] = $now;
            $this->db->table('banners')->insert($banner);
        }

        // 5. Seed News Categories & News
        $category = [
            'title'      => 'Tin Tức Hoạt Động',
            'slug'       => 'tin-tuc-hoat-dong',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $this->db->table('news_categories')->insert($category);
        $categoryId = $this->db->insertID();

        $news = [
            [
                'category_id'     => $categoryId,
                'title'           => 'Ngân Gia Nguyễn ra mắt Bộ sưu tập Bề mặt gỗ Công nghiệp Xu hướng 2026/2027',
                'slug'            => 'moc-gia-ra-mat-bo-suu-tap-be-mat-go-cong-nghiep-xu-huong-2026-2027',
                'summary'         => 'Lấy cảm hứng từ tự nhiên và phong cách tối giản Bắc Âu, Ngân Gia Nguyễn chính thức giới thiệu bộ sưu tập mới với 50+ bề mặt vân gỗ và giả đá siêu thực.',
                'content'         => '<p>Đón đầu xu hướng thiết kế nội thất xanh và tối giản, Ngân Gia Nguyễn đã chính thức công bố Bộ sưu tập bề mặt gỗ công nghiệp xu hướng 2026/2027. Bộ sưu tập mang chủ đề "Chạm vào Cảm xúc", tập trung vào các tông màu gỗ ấm áp, bề mặt nhám sần siêu thực mô phỏng hoàn hảo gỗ tự nhiên.</p><p>Tất cả sản phẩm trong bộ sưu tập mới đều sử dụng cốt ván chống ẩm đạt chuẩn Super E0 cao cấp, hoàn toàn không mùi, bảo vệ sức khỏe cho các thành viên trong gia đình. Đây hứa hẹn sẽ là nguồn cảm hứng mới cho các kiến trúc sư trong các dự án sắp tới.</p>',
                'image'           => 'news_collection.webp',
                'is_featured'     => 1,
                'status'          => 'published',
                'published_at'    => $now,
                'tags'            => 'gỗ công nghiệp, bộ sưu tập, nội thất, xu hướng 2026',
                'seo_title'       => 'Bộ sưu tập bề mặt gỗ công nghiệp xu hướng 2026 - Ngân Gia Nguyễn',
                'seo_description' => 'Ngân Gia Nguyễn ra mắt bộ sưu tập bề mặt gỗ công nghiệp mới 2026 với cốt ván siêu sạch đạt chuẩn an toàn Super E0 và vân gỗ sần sâu thời thượng.',
                'seo_keywords'    => 'bo suu tap go mọc gia, xu huong noi that 2026, go super e0',
            ],
            [
                'category_id'     => $categoryId,
                'title'           => 'Ngân Gia Nguyễn nhận chứng chỉ An toàn Sức khỏe Tiêu chuẩn Châu Âu E0',
                'slug'            => 'moc-gia-nhan-chung-chi-an-toan-suc-khoe-tieu-chuan-chau-au-e0',
                'summary'         => 'Hội đồng kiểm định quốc tế vừa trao chứng nhận tiêu chuẩn E0 cho toàn bộ dòng sản phẩm gỗ công nghiệp của Ngân Gia Nguyễn.',
                'content'         => '<p>Vừa qua, Công ty Cổ phần Gỗ Ngân Gia Nguyễn đã vinh dự đón nhận chứng chỉ tiêu chuẩn an toàn sức khỏe E0 từ Tổ chức kiểm định quốc tế. Đây là cột mốc quan trọng khẳng định cam kết của Ngân Gia Nguyễn trong việc đem lại các sản phẩm xanh, sạch và an toàn cho người sử dụng.</p><p>Tiêu chuẩn E0 quy định nghiêm ngặt về lượng phát thải Formaldehyde từ gỗ công nghiệp. Việc đạt chứng chỉ này giúp Ngân Gia Nguyễn vững bước xuất khẩu sang các thị trường khó tính như Mỹ, Châu Âu và Nhật Bản.</p>',
                'image'           => 'news_certificate.webp',
                'is_featured'     => 0,
                'status'          => 'published',
                'published_at'    => $now,
                'tags'            => 'chứng chỉ, tiêu chuẩn E0, sức khỏe, gỗ sạch',
                'seo_title'       => 'Gỗ công nghiệp Ngân Gia Nguyễn đạt chuẩn quốc tế E0 - Bảo vệ sức khỏe',
                'seo_description' => 'Chứng nhận tiêu chuẩn phát thải E0 cho ván gỗ công nghiệp MDF MFC Ngân Gia Nguyễn. Đảm bảo an toàn không độc hại cho môi trường sống.',
                'seo_keywords'    => 'chung chi go e0, van mdf an toan, go sach mọc gia',
            ],
        ];

        foreach ($news as $item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $this->db->table('news')->insert($item);
        }

        // 6. Seed Partners
        $partners = [
            ['name' => 'Vingroup', 'logo' => 'partner_vin.webp', 'link' => '#'],
            ['name' => 'Novaland Group', 'logo' => 'partner_nova.webp', 'link' => '#'],
            ['name' => 'Sun Group', 'logo' => 'partner_sun.webp', 'link' => '#'],
            ['name' => 'Khang Điền', 'logo' => 'partner_khangdien.webp', 'link' => '#'],
            ['name' => 'Đất Xanh Group', 'logo' => 'partner_datxanh.webp', 'link' => '#'],
        ];

        foreach ($partners as $partner) {
            $partner['created_at'] = $now;
            $partner['updated_at'] = $now;
            $this->db->table('partners')->insert($partner);
        }

        // 7. Seed Milestones
        $milestones = [
            [
                'year'        => 2017,
                'title'       => 'Thành lập Ngân Gia Nguyễn',
                'description' => 'Thành lập xưởng sản xuất gỗ công nghiệp đầu tiên tại TP. Hồ Chí Minh với công nghệ ép nhiệt cơ bản.',
                'sort_order'  => 1,
            ],
            [
                'year'        => 2020,
                'title'       => 'Mở rộng quy mô nhà máy',
                'description' => 'Đầu tư dây chuyền dán cạnh không đường line tự động nhập khẩu từ Đức, nâng công suất gấp 3 lần.',
                'sort_order'  => 2,
            ],
            [
                'year'        => 2023,
                'title'       => 'Đạt tiêu chuẩn E0 & Xuất khẩu',
                'description' => 'Chính thức xuất khẩu lô hàng ván gỗ MDF E0 đầu tiên sang thị trường Mỹ và các nước Đông Nam Á.',
                'sort_order'  => 3,
            ],
            [
                'year'        => 2026,
                'title'       => 'Showroom Trải Nghiệm Cao Cấp',
                'description' => 'Phát triển hệ thống showroom trưng bày trải nghiệm gỗ và nội thất may đo cao cấp tại các thành phố lớn.',
                'sort_order'  => 4,
            ],
        ];

        foreach ($milestones as $ms) {
            $ms['created_at'] = $now;
            $ms['updated_at'] = $now;
            $this->db->table('company_milestones')->insert($ms);
        }
    }
}
