<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$homeHeroLabel = get_setting('home_hero_label', 'NGÂN GIA NGUYỄN · WOOD SOLUTIONS');
$homeHeroTitle = get_setting('home_hero_title', 'CÔNG TY CỔ PHẦN GỖ NGÂN GIA NGUYỄN');
$homeHeroSub = get_setting('home_hero_sub', 'Giải pháp vật liệu gỗ công nghiệp cao cấp và thiết kế nội thất may đo độc bản đạt tiêu chuẩn quốc tế.');
$homeCtaText = get_setting('home_cta_text', 'Khám Phá Dịch Vụ');
$homeCtaLink = get_setting('home_cta_link', '/dich-vu');
$homeHeroContactText = get_setting('home_hero_contact_text', 'Liên Hệ Ngay');
$homeHeroContactLink = get_setting('home_hero_contact_link', '/lien-he');

$homeIntroTitle = get_setting('home_intro_title', 'Về chúng tôi');
$homeIntroText = get_setting('home_intro_text', 'Nội dung cấu hình trang chủ đang chuẩn bị triển khai ở giao diện frontend.');
$homeIntroEyebrow = get_setting('home_intro_eyebrow', 'Giới Thiệu Chung');
$homeIntroHeading = get_setting('home_intro_heading', 'CÔNG TY CỔ PHẦN GỖ NGÂN GIA NGUYỄN');
$homeIntroBody1 = get_setting('home_intro_body1', 'Được thành lập từ năm 2017, Ngân Gia Nguyễn đã khẳng định vị thế dẫn đầu trong lĩnh vực cung cấp các giải pháp vật liệu gỗ công nghiệp và thiết kế thi công nội thất trọn gói chất lượng cao.');
$homeIntroBody2 = get_setting('home_intro_body2', 'Chúng tôi sở hữu danh mục sản phẩm phong phú với hơn 1.000 màu sắc và bề mặt độc đáo, từ vân gỗ tự nhiên siêu thực, vân đá, giả da đến các bề mặt Acrylic, Laminate bóng gương sang trọng. Các sản phẩm của Ngân Gia Nguyễn đều đạt tiêu chuẩn an toàn sức khỏe quốc tế E0, E1.');
$homeIntroCardTitle = get_setting('home_intro_card_title', 'NGÂN GIA NGUYỄN');
$homeIntroCardAddress = get_setting('home_intro_card_address', 'VP: 126 Lý Thái Tổ, P. Diên Hồng | Xưởng: 772 Nguyễn Chí Thanh, P. An Phú, Gia Lai');
$homeIntroFeature1Title = get_setting('home_intro_feature1_title', 'Chất Lượng Quốc Tế');
$homeIntroFeature1Sub = get_setting('home_intro_feature1_sub', 'Cốt ván đạt chuẩn E0, E1 an toàn');
$homeIntroFeature2Title = get_setting('home_intro_feature2_title', 'Giải Pháp Toàn Diện');
$homeIntroFeature2Sub = get_setting('home_intro_feature2_sub', 'Thiết kế, sản xuất và thi công');
$homeIntroButtonText = get_setting('home_intro_button_text', 'Xem Chi Tiết');
$homeIntroButtonLink = get_setting('home_intro_button_link', '/gioi-thieu');

$homeWhyEyebrow = get_setting('home_why_eyebrow', 'Giá Trị Cốt Lõi');
$homeWhyTitle = get_setting('home_why_title', 'Tại Sao Nên Chọn Chúng Tôi');
$homeWhyCard1Title = get_setting('home_why_card1_title', 'Bề Mặt Siêu Thực');
$homeWhyCard1Desc = get_setting('home_why_card1_desc', 'Sở hữu hơn 1.000 màu sắc và bề mặt vân gỗ, giả đá, đơn sắc thời thượng, dẫn đầu xu hướng kiến trúc hiện đại.');
$homeWhyCard2Title = get_setting('home_why_card2_title', 'An Toàn Sức Khỏe');
$homeWhyCard2Desc = get_setting('home_why_card2_desc', 'Toàn bộ ván gỗ đạt chuẩn phát thải E0, E1 châu Âu, bảo vệ tối đa sức khỏe cho cả gia đình bạn.');
$homeWhyCard3Title = get_setting('home_why_card3_title', 'Dịch Vụ May Đo');
$homeWhyCard3Desc = get_setting('home_why_card3_desc', 'Quy trình thiết kế sản xuất may đo (Bespoke) tinh xảo, đáp ứng chuẩn xác mọi ý tưởng kiến trúc độc bản.');

$homeStats = [
    ['value' => get_setting('home_stats_item1_value', '9+'), 'title' => get_setting('home_stats_item1_title', 'Năm Hoạt Động')],
    ['value' => get_setting('home_stats_item2_value', '100%'), 'title' => get_setting('home_stats_item2_title', 'Khách Hàng Hài Lòng')],
    ['value' => get_setting('home_stats_item3_value', '50+'), 'title' => get_setting('home_stats_item3_title', 'Công Trình Đã Thi Công')],
    ['value' => get_setting('home_stats_item4_value', '24/7'), 'title' => get_setting('home_stats_item4_title', 'Hỗ Trợ Phục Vụ')],
];

$homeServicesEyebrow = get_setting('home_services_eyebrow', 'Lĩnh Vực Hoạt Động');
$homeServicesTitle = get_setting('home_services_title', 'Dịch Vụ Của Chúng Tôi');
$homeServicesEmptyText = get_setting('home_services_empty_text', 'Đang cập nhật danh sách dịch vụ...');

$homeGalleryEyebrow = get_setting('home_gallery_eyebrow', 'Hình Ảnh Thực Tế');
$homeGalleryTitle = get_setting('home_gallery_title', 'Thư Viện Ảnh Hoạt Động');
$homeGalleryViewAllText = get_setting('home_gallery_view_all_text', 'Xem Tất Cả Hình Ảnh');
$homeGalleryEmptyText = get_setting('home_gallery_empty_text', 'Đang cập nhật thư viện ảnh...');

$homeNewsEyebrow = get_setting('home_news_eyebrow', 'Tin Tức Mới Nhất');
$homeNewsTitle = get_setting('home_news_title', 'Bản Tin Ngân Gia Nguyễn');
$homeNewsEmptyText = get_setting('home_news_empty_text', 'Đang cập nhật tin tức mới...');
$homeNewsReadMoreText = get_setting('home_news_read_more_text', 'Đọc Tiếp');

$homePartnersEmptyPrefix = get_setting('home_partners_empty_prefix', 'Đối tác');

$homeSectionOrders = [
    'home-intro'        => (int) get_setting('home_section_order_intro', '10'),
    'home-why'          => (int) get_setting('home_section_order_why', '20'),
    'home-services'     => (int) get_setting('home_section_order_services', '30'),
    'home-gallery'      => (int) get_setting('home_section_order_gallery', '40'),
    'home-news'         => (int) get_setting('home_section_order_news', '50'),
    'home-partners'     => (int) get_setting('home_section_order_partners', '60'),
    'home-certificates' => (int) get_setting('home_section_order_certificates', '70'),
];

$extractYouTubeId = static function (string $url): ?string {
    $url = trim($url);
    if ($url === '') {
        return null;
    }

    if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~i', $url, $m)) {
        return $m[1] ?? null;
    }

    return null;
};
?>

<!-- Hero Slider Section (Swiper) -->
<section class="hero-slider swiper">
    <div class="swiper-wrapper">
        <?php if (!empty($banners)): ?>
            <?php foreach ($banners as $banner): ?>
                <div class="swiper-slide hero-slide-item" style="background-image: url('<?= base_url('uploads/banners/' . esc($banner['desktop_image'])) ?>');">
                    <div class="hero-slide-overlay"></div>
                    <div class="container">
                        <div class="hero-slide-content">
                            <span class="hero-label"><i class="bi bi-building me-1"></i> <?= esc($homeHeroLabel) ?></span>
                            <h2 class="text-white fw-bold"><?= esc($banner['title']) ?></h2>
                            <p class="text-white-50"><?= esc($banner['subtitle']) ?></p>
                            <?php if (!empty($banner['button_text'])): ?>
                                <a href="<?= esc($banner['button_link']) ?>" class="btn btn-primary btn-custom btn-lg rounded-pill me-2">
                                    <?= esc($banner['button_text']) ?> <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?= base_url(ltrim($homeHeroContactLink, '/')) ?>" class="btn btn-outline-light btn-custom btn-lg rounded-pill">
                                <i class="bi bi-telephone me-1"></i> <?= esc($homeHeroContactText) ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Fallback Mock Banner -->
            <div class="swiper-slide hero-slide-item" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                <div class="hero-slide-overlay"></div>
                <!-- decorative circles -->
                <div style="position:absolute;width:500px;height:500px;border-radius:50%;border:1px solid rgba(255,255,255,0.06);top:-100px;right:-80px;z-index:1;"></div>
                <div style="position:absolute;width:320px;height:320px;border-radius:50%;border:1px solid rgba(255,255,255,0.08);top:80px;right:80px;z-index:1;"></div>
                <div class="container">
                    <div class="hero-slide-content">
                        <span class="hero-label"><i class="bi bi-building me-1"></i> <?= esc($homeHeroLabel) ?></span>
                        <h2 class="text-white fw-bold"><?= nl2br(esc($homeHeroTitle)) ?></h2>
                        <p class="text-white-50"><?= esc($homeHeroSub) ?></p>
                        <a href="<?= base_url(ltrim($homeCtaLink, '/')) ?>" class="btn btn-primary btn-custom btn-lg rounded-pill me-2">
                            <?= esc($homeCtaText) ?> <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                        <a href="<?= base_url(ltrim($homeHeroContactLink, '/')) ?>" class="btn btn-outline-light btn-custom btn-lg rounded-pill">
                            <i class="bi bi-telephone me-1"></i> <?= esc($homeHeroContactText) ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- Add Pagination & Navigation -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next d-none d-md-flex"></div>
    <div class="swiper-button-prev d-none d-md-flex"></div>
</section>

<!-- Company Introduction Section -->
<section class="section-padding home-sortable-section" data-home-section="home-intro" data-home-order="<?= $homeSectionOrders['home-intro'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center mb-4">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeIntroTitle) ?></span>
            <p class="text-muted mb-0"><?= esc($homeIntroText) ?></p>
        </div>
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="position-relative">
                    <div class="bg-primary position-absolute" style="top: -12px; left: -12px; width: 100%; height: 100%; z-index: -1; opacity: 0.08; border-radius: 8px;"></div>
                    <!-- Play Video / Introduction Image card mimicking huongvietsinh -->
                    <div class="shadow-sm position-relative overflow-hidden" style="height: 400px; border-radius: 8px;">
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center text-white text-center" style="background: linear-gradient(135deg, rgba(var(--primary-dark-rgb), 0.85) 0%, rgba(var(--primary-rgb), 0.75) 100%), url('<?= base_url('uploads/settings/' . get_setting('site_logo')) ?>') center/cover no-repeat;">
                            <div class="p-4" style="z-index: 2;">
                                <div class="play-btn-wrapper mb-3 d-inline-flex align-items-center justify-content-center rounded-circle bg-white text-primary" style="width: 72px; height: 72px; cursor: pointer; box-shadow: 0 4px 15px rgba(0,0,0,0.15); transition: transform 0.3s ease;" onclick="alert('Xem video giới thiệu giải pháp gỗ nội thất Ngân Gia Nguyễn')">
                                    <i class="bi bi-play-fill fs-1" style="margin-left: 4px; color: var(--primary-color);"></i>
                                </div>
                                <h4 class="fw-bold mb-1"><?= esc($homeIntroCardTitle) ?></h4>
                                <p class="mb-0 text-white-50" style="font-size: 0.85rem;"><?= esc($homeIntroCardAddress) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="text-primary fw-bold text-uppercase d-block mb-2" style="letter-spacing: 1px; font-size: 0.85rem;"><?= esc($homeIntroEyebrow) ?></span>
                <h2 class="section-title-left mb-4" style="font-size: 1.8rem;"><?= esc($homeIntroHeading) ?></h2>
                <p class="text-muted" style="font-size: 0.95rem; line-height: 1.7;"><?= esc($homeIntroBody1) ?></p>
                <p class="text-muted" style="font-size: 0.95rem; line-height: 1.7;"><?= esc($homeIntroBody2) ?></p>
                <div class="row g-4 mt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 44px; height: 44px; min-width: 44px; border: 1.5px solid var(--primary-color);">
                                <i class="bi bi-check-lg text-primary fs-4" style="color: var(--primary-color) !important;"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;"><?= esc($homeIntroFeature1Title) ?></h6>
                                <small class="text-muted" style="font-size: 0.8rem;"><?= esc($homeIntroFeature1Sub) ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 44px; height: 44px; min-width: 44px; border: 1.5px solid var(--accent-color);">
                                <i class="bi bi-shield-check text-warning fs-4" style="color: var(--accent-color) !important;"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.95rem;"><?= esc($homeIntroFeature2Title) ?></h6>
                                <small class="text-muted" style="font-size: 0.8rem;"><?= esc($homeIntroFeature2Sub) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url(ltrim($homeIntroButtonLink, '/')) ?>" class="btn btn-outline-primary btn-custom mt-4" style="font-size: 0.9rem; font-weight: bold; border-radius: 4px !important;"><?= esc($homeIntroButtonText) ?> <i class="bi bi-chevron-right ms-1"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us & Statistics -->
<section class="section-padding bg-light-gray home-sortable-section" data-home-section="home-why" data-home-order="<?= $homeSectionOrders['home-why'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeWhyEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeWhyTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h4><?= esc($homeWhyCard1Title) ?></h4>
                    <p class="text-muted mb-0"><?= esc($homeWhyCard1Desc) ?></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h4><?= esc($homeWhyCard2Title) ?></h4>
                    <p class="text-muted mb-0"><?= esc($homeWhyCard2Desc) ?></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4><?= esc($homeWhyCard3Title) ?></h4>
                    <p class="text-muted mb-0"><?= esc($homeWhyCard3Desc) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stat-section home-sortable-section" data-home-section="home-why" data-home-order="<?= $homeSectionOrders['home-why'] + 1 ?>">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php foreach ($homeStats as $stat): ?>
                <?php $homeStatCount = preg_replace('/\D+/', '', (string) $stat['value']) ?: '0'; ?>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number" data-count="<?= esc($homeStatCount) ?>"><?= esc($stat['value']) ?></div>
                        <div class="stat-title"><?= esc($stat['title']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding home-sortable-section" id="services" data-home-section="home-services" data-home-order="<?= $homeSectionOrders['home-services'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeServicesEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeServicesTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <?php
                    $homeServiceImageRaw = (string) ($service['image'] ?? '');
                    $homeServiceImagePath = '';
                    $homeServiceImageUrl = '';
                    if ($homeServiceImageRaw !== '') {
                        if (strpos($homeServiceImageRaw, 'uploads/') === 0) {
                            $homeServiceImagePath = FCPATH . $homeServiceImageRaw;
                            $homeServiceImageUrl = base_url($homeServiceImageRaw);
                        } else {
                            $homeServiceImagePath = FCPATH . 'uploads/services/' . $homeServiceImageRaw;
                            $homeServiceImageUrl = base_url('uploads/services/' . $homeServiceImageRaw);
                        }
                    }
                    $homeServiceHasImage = !empty($homeServiceImagePath) && file_exists($homeServiceImagePath);
                    ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-img-wrapper">
                                <?php if ($homeServiceHasImage): ?>
                                    <img src="<?= $homeServiceImageUrl ?>" alt="<?= esc($service['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                <?php else: ?>
                                    <div class="w-100 h-100 bg-primary d-flex align-items-center justify-content-center text-white" style="background: linear-gradient(135deg, rgba(var(--primary-rgb),0.85), rgba(var(--primary-dark-rgb),0.92));">
                                        <i class="bi <?= esc($service['icon']) ?> fs-1"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="service-icon-badge">
                                    <i class="bi <?= esc($service['icon']) ?>"></i>
                                </div>
                            </div>
                            <div class="service-info">
                                <h3><a href="<?= base_url('dich-vu/' . esc($service['slug'])) ?>"><?= esc($service['title']) ?></a></h3>
                                <p class="text-muted mb-3"><?= esc($service['summary']) ?></p>
                                <a href="<?= base_url('dich-vu/' . esc($service['slug'])) ?>" class="text-primary text-decoration-none fw-bold small d-inline-flex align-items-center gap-1">Xem thêm <i class="bi bi-chevron-right" style="font-size:0.8rem;"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted"><?= esc($homeServicesEmptyText) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Gallery Section (Album Cards) -->
<?php
$homeAlbumMap = [];
if (!empty($albums)) {
    foreach ($albums as $alb) {
        $homeAlbumMap[$alb['slug']] = [
            'title'       => $alb['title'],
            'slug'        => $alb['slug'],
            'images'      => [],
            'cover_url'   => '',
            'image_count' => 0,
            'video_count' => 0,
        ];
    }
}
$homeAlbumMap['__uncategorised__'] = [
    'title'       => 'Hình ảnh khác',
    'slug'        => '__uncategorised__',
    'images'      => [],
    'cover_url'   => '',
    'image_count' => 0,
    'video_count' => 0,
];

if (!empty($gallery)) {
    foreach ($gallery as $img) {
        $albSlug     = $img['album'] ?? '';
        $videoUrl    = trim((string)($img['video'] ?? ''));
        $ytId        = $extractYouTubeId($videoUrl);
        $isVideo     = !empty($ytId);
        $imageUrl    = !empty($img['image']) ? base_url('uploads/gallery/' . $img['image']) : '';
        $previewUrl  = $isVideo ? ('https://img.youtube.com/vi/' . $ytId . '/hqdefault.jpg') : $imageUrl;
        $openUrl     = $isVideo ? ('https://www.youtube.com/embed/' . $ytId . '?autoplay=1&rel=0') : $imageUrl;
        $imagePath   = !empty($img['image']) ? FCPATH . 'uploads/gallery/' . $img['image'] : '';
        $hasPreview  = $isVideo || (!empty($imagePath) && file_exists($imagePath));

        $entry = [
            'title'       => $img['title'] ?? '',
            'preview'     => $previewUrl,
            'open_url'    => $openUrl,
            'image_url'   => $imageUrl,
            'is_video'    => $isVideo,
            'has_preview' => $hasPreview,
            'album_slug'  => $albSlug,
        ];

        if (isset($homeAlbumMap[$albSlug])) {
            $homeAlbumMap[$albSlug]['images'][] = $entry;
            if ($isVideo) {
                $homeAlbumMap[$albSlug]['video_count']++;
            } else {
                $homeAlbumMap[$albSlug]['image_count']++;
                if (empty($homeAlbumMap[$albSlug]['cover_url']) && !empty($imageUrl)) {
                    $homeAlbumMap[$albSlug]['cover_url'] = $imageUrl;
                }
            }
        } else {
            $homeAlbumMap['__uncategorised__']['images'][] = $entry;
            if ($isVideo) {
                $homeAlbumMap['__uncategorised__']['video_count']++;
            } else {
                $homeAlbumMap['__uncategorised__']['image_count']++;
                if (empty($homeAlbumMap['__uncategorised__']['cover_url']) && !empty($imageUrl)) {
                    $homeAlbumMap['__uncategorised__']['cover_url'] = $imageUrl;
                }
            }
        }
    }
}

// Filter empty albums
$homeAlbumMap = array_filter($homeAlbumMap, fn($a) => (count($a['images']) > 0));

$jsHomeAlbumData = [];
foreach ($homeAlbumMap as $slug => $alb) {
    $jsHomeAlbumData[$slug] = [
        'title'       => $alb['title'],
        'all_items'   => array_values($alb['images']),
        'photo_items' => array_values(array_filter($alb['images'], fn($i) => !$i['is_video'])),
    ];
}
?>

<section class="section-padding home-sortable-section" id="gallery" data-home-section="home-gallery" data-home-order="<?= $homeSectionOrders['home-gallery'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeGalleryEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeGalleryTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($homeAlbumMap)): ?>
                <?php $displayedCount = 0; ?>
                <?php foreach ($homeAlbumMap as $slug => $alb): ?>
                    <?php
                    if ($displayedCount >= 6) break;
                    $displayedCount++;
                    $totalCount = $alb['image_count'] + $alb['video_count'];
                    $hasCover   = !empty($alb['cover_url']);
                    ?>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="album-card home-album-card" data-album-slug="<?= esc($slug) ?>" role="button" tabindex="0" aria-label="Xem album <?= esc($alb['title']) ?>">
                            <div class="album-card-thumb">
                                <?php if ($hasCover): ?>
                                    <img src="<?= esc($alb['cover_url']) ?>" alt="<?= esc($alb['title']) ?>" loading="lazy">
                                <?php else: ?>
                                    <div class="album-card-no-cover d-flex align-items-center justify-content-center h-100">
                                        <i class="bi bi-images display-3 opacity-50"></i>
                                    </div>
                                <?php endif; ?>

                                <!-- overlay -->
                                <div class="album-card-overlay">
                                    <div class="album-card-open-btn">
                                        <i class="bi bi-journal-album me-2"></i>Xem Album (3D)
                                    </div>
                                </div>

                                <!-- badges -->
                                <div class="album-card-badges">
                                    <?php if ($alb['image_count'] > 0): ?>
                                        <span class="badge-count"><i class="bi bi-image-fill me-1"></i><?= $alb['image_count'] ?> ảnh</span>
                                    <?php endif; ?>
                                    <?php if ($alb['video_count'] > 0): ?>
                                        <span class="badge-count badge-video"><i class="bi bi-play-fill me-1"></i><?= $alb['video_count'] ?> video</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="album-card-meta">
                                <h5 class="album-card-title"><?= esc($alb['title']) ?></h5>
                                <span class="album-card-sub"><?= $totalCount ?> mục &nbsp;·&nbsp; <span class="text-primary">Lật Xem Album <i class="bi bi-arrow-right"></i></span></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted"><?= esc($homeGalleryEmptyText) ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-4">
            <a href="<?= base_url('thu-vien') ?>" class="btn btn-outline-primary btn-custom rounded-pill"><?= esc($homeGalleryViewAllText) ?></a>
        </div>
    </div>
</section>

<script>
(function() {
    'use strict';
    const HOME_ALBUM_DATA = <?= json_encode($jsHomeAlbumData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

    document.querySelectorAll('.home-album-card[data-album-slug]').forEach(function(card) {
        card.addEventListener('click', function() {
            const slug = this.getAttribute('data-album-slug');
            const alb = HOME_ALBUM_DATA[slug];
            if (!alb) return;

            if (alb.photo_items && alb.photo_items.length > 0) {
                const imagesForFlip = alb.photo_items.map(function(img) {
                    return {
                        url: img.image_url,
                        caption: img.title
                    };
                });
                if (typeof window.openAlbumFlipbook === 'function') {
                    window.openAlbumFlipbook(imagesForFlip, alb.title, 0);
                }
            } else if (alb.all_items && alb.all_items.length > 0 && alb.all_items[0].is_video) {
                if (typeof Fancybox !== 'undefined' && Fancybox.show) {
                    Fancybox.show([{ src: alb.all_items[0].open_url, type: 'iframe', caption: alb.all_items[0].title }]);
                }
            }
        });
        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
})();
</script>

<!-- Latest News Section -->
<section class="section-padding home-sortable-section" data-home-section="home-news" data-home-order="<?= $homeSectionOrders['home-news'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeNewsEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeNewsTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                    <?php
                    $homeNewsImageRaw = (string) ($item['image'] ?? '');
                    $homeNewsImagePath = '';
                    $homeNewsImageUrl = '';
                    if ($homeNewsImageRaw !== '') {
                        if (strpos($homeNewsImageRaw, 'uploads/') === 0) {
                            $homeNewsImagePath = FCPATH . $homeNewsImageRaw;
                            $homeNewsImageUrl = base_url($homeNewsImageRaw);
                        } else {
                            $homeNewsImagePath = FCPATH . 'uploads/news/' . $homeNewsImageRaw;
                            $homeNewsImageUrl = base_url('uploads/news/' . $homeNewsImageRaw);
                        }
                    }
                    ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="news-card">
                            <div class="news-img-wrapper">
                                <?php if (!empty($homeNewsImagePath) && file_exists($homeNewsImagePath)): ?>
                                    <img src="<?= $homeNewsImageUrl ?>" alt="<?= esc($item['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                <?php else: ?>
                                    <div class="w-100 h-100 bg-secondary text-white d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                                        <i class="bi bi-newspaper fs-1"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="news-body">
                                <div class="news-meta">
                                    <i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($item['published_at'])) ?>
                                </div>
                                <h3 class="news-title"><a href="<?= base_url('tin-tuc/' . esc($item['slug'])) ?>"><?= esc($item['title']) ?></a></h3>
                                <p class="text-muted small mb-2"><?= esc($item['summary']) ?></p>
                                <a href="<?= base_url('tin-tuc/' . esc($item['slug'])) ?>" class="text-primary text-decoration-none fw-bold small d-inline-flex align-items-center gap-1"><?= esc($homeNewsReadMoreText) ?> <i class="bi bi-chevron-right" style="font-size:0.8rem;"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted"><?= esc($homeNewsEmptyText) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="section-padding bg-light-gray home-sortable-section home-partners-section" data-home-section="home-partners" data-home-order="<?= $homeSectionOrders['home-partners'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center mb-4" data-aos="fade-up">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc(lang('Site.our_partners')) ?></span>
            <h2 class="fw-bold mb-0 text-dark"><?= esc(lang('Site.partners_subtitle')) ?></h2>
        </div>
        <div class="swiper partners-slider" data-aos="fade-up" data-aos-delay="150">
            <div class="swiper-wrapper align-items-center">
                <?php if (!empty($partners)): ?>
                    <?php foreach ($partners as $partner): ?>
                        <div class="swiper-slide text-center">
                            <?php
                            $logoPath = !empty($partner['logo']) ? FCPATH . 'uploads/partners/' . $partner['logo'] : null;
                            $logoUrl = !empty($partner['logo']) ? base_url('uploads/partners/' . $partner['logo']) : '';
                            $hasLogo = $logoPath && file_exists($logoPath);
                            ?>
                            <?php if ($hasLogo): ?>
                                <?php if (!empty($partner['link']) && $partner['link'] !== '#'): ?>
                                    <a href="<?= esc($partner['link']) ?>" target="_blank" rel="noopener" class="partner-card-item w-100 d-flex align-items-center justify-content-center p-3 bg-white shadow-sm rounded-4 border text-decoration-none">
                                        <img src="<?= $logoUrl ?>" alt="<?= esc($partner['name']) ?>" class="partner-logo-img">
                                    </a>
                                <?php else: ?>
                                    <div class="partner-card-item w-100 d-flex align-items-center justify-content-center p-3 bg-white shadow-sm rounded-4 border">
                                        <img src="<?= $logoUrl ?>" alt="<?= esc($partner['name']) ?>" class="partner-logo-img">
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="partner-card-item w-100 d-flex align-items-center justify-content-center p-3 bg-white shadow-sm rounded-4 border text-dark fw-bold">
                                    <?= esc($partner['name']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php for($i=1; $i<=6; $i++): ?>
                        <div class="swiper-slide text-center">
                            <div class="partner-card-item w-100 d-flex align-items-center justify-content-center p-3 bg-white shadow-sm rounded-4 border text-muted fw-semibold" style="font-size: 0.9rem;">
                                <i class="bi bi-building me-2 text-primary"></i> <?= esc($homePartnersEmptyPrefix) ?> <?= $i ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Certificate Documents Section -->
<section class="section-padding home-sortable-section" id="certificates" data-home-section="home-certificates" data-home-order="<?= $homeSectionOrders['home-certificates'] ?>">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div class="section-title-wrapper text-start mb-0">
                <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc(lang('Site.legal_docs')) ?></span>
                <h2 class="section-title mb-0"><?= esc(lang('Site.certificates')) ?></h2>
            </div>
            <a href="<?= base_url('giay-to/loai/giay-chung-nhan') ?>" class="btn btn-outline-primary btn-custom rounded-pill"><?= esc(lang('Site.view_all')) ?></a>
        </div>

        <?php if (!empty($certificates)): ?>
            <div class="swiper certificates-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($certificates as $cert): ?>
                        <?php
                        $fileName = $cert['file_attachment'] ?: ($cert['pdf_attachment'] ?? '');
                        $fileUrl = '';
                        $fileExt = '';
                        $isImageFile = false;
                        $isPdfFile = false;
                        if (!empty($fileName)) {
                            $fileExt = strtolower((string) pathinfo($fileName, PATHINFO_EXTENSION));
                            $mime = strtolower((string) ($cert['file_mime'] ?? ''));
                            $isImageFile = strpos($mime, 'image/') === 0 || in_array($fileExt, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true);
                            $isPdfFile = ($fileExt === 'pdf') || ($mime === 'application/pdf');

                            if (file_exists(FCPATH . 'uploads/documents/' . $fileName)) {
                                $fileUrl = base_url('uploads/documents/' . $fileName);
                            } elseif (file_exists(FCPATH . 'uploads/certificates/' . $fileName)) {
                                $fileUrl = base_url('uploads/certificates/' . $fileName);
                            }
                        }

                        $imageUrl = '';
                        if (!empty($cert['image'])) {
                            if (file_exists(FCPATH . 'uploads/documents/' . $cert['image'])) {
                                $imageUrl = base_url('uploads/documents/' . $cert['image']);
                            } elseif (file_exists(FCPATH . 'uploads/certificates/' . $cert['image'])) {
                                $imageUrl = base_url('uploads/certificates/' . $cert['image']);
                            }
                        }

                        // Backward compatibility
                        if (empty($imageUrl) && $isImageFile && !empty($fileUrl)) {
                            $imageUrl = $fileUrl;
                        }

                        $targetViewUrl = !empty($fileUrl) ? $fileUrl : $imageUrl;
                        $fancyType = '';
                        if ($isPdfFile) {
                            $fancyType = 'iframe';
                        } elseif ($isImageFile || (!empty($imageUrl) && empty($fileUrl))) {
                            $fancyType = 'image';
                            if (empty($targetViewUrl)) $targetViewUrl = $imageUrl;
                        } elseif (in_array($fileExt, ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'], true)) {
                            $fancyType = 'iframe';
                            $targetViewUrl = 'https://docs.google.com/gview?embedded=1&url=' . rawurlencode($targetViewUrl);
                        } else {
                            $fancyType = 'image';
                            $targetViewUrl = $imageUrl ?: $fileUrl;
                        }

                        $fileLabel = strtoupper($fileExt ?: 'FILE');
                        $fileIcon = 'bi-file-earmark-text';
                        $fileIconClass = 'text-primary';
                        if ($isPdfFile) {
                            $fileIcon = 'bi-file-earmark-pdf';
                            $fileIconClass = 'text-danger';
                        } elseif (in_array($fileExt, ['doc', 'docx'], true)) {
                            $fileIcon = 'bi-file-earmark-word';
                            $fileIconClass = 'text-primary';
                        } elseif (in_array($fileExt, ['xls', 'xlsx', 'csv'], true)) {
                            $fileIcon = 'bi-file-earmark-excel';
                            $fileIconClass = 'text-success';
                        }
                        ?>
                        <div class="swiper-slide">
                            <article class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                                <div class="ratio ratio-4x3 bg-white border-bottom d-flex align-items-center justify-content-center position-relative overflow-hidden">
                                    <?php if (!empty($imageUrl) && !$isPdfFile): ?>
                                        <a href="<?= $imageUrl ?>" data-fancybox="certificates" data-caption="<?= esc($cert['title']) ?>" class="d-block w-100 h-100 text-decoration-none">
                                            <img src="<?= $imageUrl ?>" alt="<?= esc($cert['title']) ?>" style="width:100%;height:100%;object-fit:contain;">
                                        </a>
                                    <?php elseif ($isPdfFile && !empty($fileUrl)): ?>
                                        <a href="#" data-doc-viewer="<?= $fileUrl ?>" data-doc-title="<?= esc($cert['title']) ?>" class="d-block w-100 h-100 text-decoration-none position-relative">
                                            <?php if (!empty($imageUrl)): ?>
                                                <img src="<?= $imageUrl ?>" alt="<?= esc($cert['title']) ?>" style="width:100%;height:100%;object-fit:contain;">
                                                <span class="position-absolute top-50 start-50 translate-middle bg-dark bg-opacity-75 text-white rounded-pill px-3 py-1 small">
                                                    <i class="bi bi-file-earmark-pdf text-danger me-1"></i> Xem PDF
                                                </span>
                                            <?php else: ?>
                                                <div class="certificate-doc-placeholder d-flex flex-column align-items-center justify-content-center w-100 h-100 p-3">
                                                    <i class="bi bi-file-earmark-pdf text-danger display-4 mb-2"></i>
                                                    <span class="fw-bold text-dark">FILE PDF</span>
                                                    <span class="text-muted small">Nhấn để xem tài liệu</span>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= $targetViewUrl ?>" data-fancybox="certificates" data-caption="<?= esc($cert['title']) ?>" class="certificate-doc-placeholder d-flex flex-column align-items-center justify-content-center text-decoration-none w-100 h-100 p-3">
                                            <i class="bi <?= esc($fileIcon) ?> <?= esc($fileIconClass) ?> display-4 mb-2"></i>
                                            <span class="fw-bold text-dark"><?= esc($fileLabel) ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="fw-bold mb-2" style="font-size:0.95rem; line-height:1.35;"><?= esc($cert['title']) ?></h5>
                                        <?php if (!empty($cert['organization']) || !empty($cert['issue_date'])): ?>
                                            <div class="small text-muted mb-3">
                                                <?php if (!empty($cert['organization'])): ?><div><i class="bi bi-building me-1"></i><?= esc($cert['organization']) ?></div><?php endif; ?>
                                                <?php if (!empty($cert['issue_date'])): ?><div><i class="bi bi-calendar3 me-1"></i><?= date('d/m/Y', strtotime($cert['issue_date'])) ?></div><?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="d-flex gap-2 mt-2">
                                        <?php if ($isPdfFile && !empty($fileUrl)): ?>
                                            <a href="#" data-doc-viewer="<?= $fileUrl ?>" data-doc-title="<?= esc($cert['title']) ?>" class="btn btn-outline-danger btn-sm rounded-pill flex-grow-1">
                                                <i class="bi bi-file-earmark-pdf me-1"></i> Xem File PDF
                                            </a>
                                        <?php elseif (!empty($imageUrl)): ?>
                                            <a href="<?= $imageUrl ?>" data-fancybox="certificates" data-caption="<?= esc($cert['title']) ?>" class="btn btn-outline-primary btn-sm rounded-pill flex-grow-1">
                                                <i class="bi bi-eye-fill me-1"></i> Xem Hình Ảnh
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($fileUrl)): ?>
                                            <a href="<?= $fileUrl ?>" download class="btn btn-light btn-sm rounded-circle text-muted" title="Tải file về máy">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center text-muted py-4"><?= esc(lang('Site.updating_certificates')) ?></div>
        <?php endif; ?>
    </div>
</section>

<script>
    (function () {
        var main = document.querySelector('main');
        if (!main) {
            return;
        }

        var sections = Array.prototype.slice.call(document.querySelectorAll('.home-sortable-section'));
        sections.sort(function (a, b) {
            var av = parseInt(a.getAttribute('data-home-order') || '9999', 10);
            var bv = parseInt(b.getAttribute('data-home-order') || '9999', 10);
            return av - bv;
        });

        sections.forEach(function (section) {
            main.appendChild(section);
        });
    })();
</script>

<?= $this->endSection() ?>
