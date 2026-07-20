<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Hero -->
<section class="page-hero-section position-relative overflow-hidden" style="background: linear-gradient(135deg, #1a1a1a 0%, #3d2b1f 100%); padding: 80px 0 60px;">
    <div class="container position-relative z-1">
        <nav aria-label="breadcrumb" class="mb-3" data-aos="fade-right" data-aos-duration="600">
            <ol class="breadcrumb mb-0" style="--bs-breadcrumb-divider-color: rgba(255,255,255,0.4);">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white-50 text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item text-white-50">Sản phẩm</li>
                <?php if ($activeCategory): ?>
                    <li class="breadcrumb-item text-white active" aria-current="page"><?= esc($activeCategory['title']) ?></li>
                <?php endif; ?>
            </ol>
        </nav>
        <h1 class="text-white fw-bold mb-2" data-aos="fade-up" data-aos-duration="700">
            <?= $activeCategory ? esc($activeCategory['title']) : 'Tất cả sản phẩm' ?>
        </h1>
        <?php if ($activeCategory && ! empty($activeCategory['description'])): ?>
            <p class="text-white-50 mb-0 fs-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                <?= esc($activeCategory['description']) ?>
            </p>
        <?php else: ?>
            <p class="text-white-50 mb-0 fs-6" data-aos="fade-up" data-aos-delay="100">
                Khám phá bộ sưu tập vật liệu gỗ cao cấp của Ngân Gia Nguyễn
            </p>
        <?php endif; ?>
    </div>
    <!-- Decorative elements -->
    <div class="position-absolute top-0 end-0 opacity-10" style="width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,#c8a96e,transparent);transform:translate(30%,-30%);"></div>
</section>

<!-- Main Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <!-- Sidebar: Category Filter -->
            <div class="col-lg-3" data-aos="fade-right" data-aos-duration="700">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden sticky-top" style="top:90px;">
                    <div class="card-header border-0 px-4 py-3" style="background:linear-gradient(135deg,#1a1a1a,#3d2b1f);">
                        <h6 class="mb-0 fw-bold text-white"><i class="bi bi-tags me-2"></i>Nhóm sản phẩm</h6>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="<?= base_url('san-pham') ?>"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?= ! $activeCategory ? 'active' : '' ?>">
                            <span><i class="bi bi-grid-3x3-gap me-2"></i>Tất cả sản phẩm</span>
                            <span class="badge bg-secondary rounded-pill"><?= array_sum(array_column($categories, 'product_count')) ?></span>
                        </a>
                        <?php foreach ($categories as $cat): ?>
                            <a href="<?= base_url('san-pham/nhom/' . $cat['slug']) ?>"
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?= ($activeCategory && $activeCategory['id'] == $cat['id']) ? 'active' : '' ?>">
                                <span>
                                    <i class="bi <?= esc($cat['icon'] ?: 'bi-box-seam') ?> me-2"></i>
                                    <?= esc($cat['title']) ?>
                                </span>
                                <span class="badge bg-secondary rounded-pill"><?= (int) $cat['product_count'] ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-lg-9">

                <!-- Stats Row -->
                <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-left" data-aos-duration="600">
                    <p class="mb-0 text-muted">
                        Hiển thị <strong><?= count($products) ?></strong> sản phẩm
                        <?= $activeCategory ? 'trong nhóm <strong>' . esc($activeCategory['title']) . '</strong>' : '' ?>
                    </p>
                </div>

                <?php if (! empty($products)): ?>
                    <div class="row g-4">
                        <?php foreach ($products as $idx => $p): ?>
                            <div class="col-sm-6 col-xl-4" data-aos="fade-up" data-aos-delay="<?= ($idx % 3) * 80 ?>" data-aos-duration="700">
                                <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                                    <!-- Thumbnail -->
                                    <div class="product-card-img-wrap position-relative overflow-hidden" style="height:220px;">
                                        <?php if (! empty($p['cover_image'])): ?>
                                            <img src="<?= base_url($p['cover_image']) ?>"
                                                 alt="<?= esc($p['title']) ?>"
                                                 class="w-100 h-100 product-card-img"
                                                 style="object-fit:cover;transition:transform 0.4s ease;"
                                                 loading="lazy">
                                        <?php else: ?>
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center"
                                                 style="background:linear-gradient(135deg,#f8f6f2,#ede9e0);">
                                                <i class="bi bi-image text-muted" style="font-size:3rem;opacity:0.3;"></i>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Category badge -->
                                        <?php if (! empty($p['category_title'])): ?>
                                            <span class="position-absolute top-0 start-0 m-2 badge text-white rounded-pill px-3"
                                                  style="background:rgba(200,169,110,0.9);font-size:0.7rem;">
                                                <?= esc($p['category_title']) ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if ($p['is_featured']): ?>
                                            <span class="position-absolute top-0 end-0 m-2 badge bg-warning text-dark rounded-pill px-2" style="font-size:0.7rem;">
                                                <i class="bi bi-star-fill me-1"></i>Nổi bật
                                            </span>
                                        <?php endif; ?>

                                        <!-- Hover overlay -->
                                        <div class="product-card-overlay position-absolute inset-0 d-flex align-items-center justify-content-center"
                                             style="top:0;left:0;right:0;bottom:0;background:rgba(26,26,26,0.6);opacity:0;transition:opacity 0.3s ease;">
                                            <a href="<?= base_url('san-pham/' . $p['slug']) ?>"
                                               class="btn text-white rounded-pill px-4"
                                               style="border:2px solid #c8a96e;font-size:0.85rem;">
                                                <i class="bi bi-eye me-1"></i>Xem chi tiết
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Body -->
                                    <div class="card-body p-4 d-flex flex-column">
                                        <?php if (! empty($p['sku'])): ?>
                                            <small class="text-muted mb-1" style="font-size:0.72rem;">Mã: <?= esc($p['sku']) ?></small>
                                        <?php endif; ?>
                                        <h5 class="fw-bold mb-2 product-card-title" style="font-size:0.95rem;line-height:1.4;min-height:2.8em;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                            <?= esc($p['title']) ?>
                                        </h5>
                                        <?php if (! empty($p['summary'])): ?>
                                            <p class="text-muted small mb-3" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;flex-grow:1;">
                                                <?= esc($p['summary']) ?>
                                            </p>
                                        <?php else: ?>
                                            <div style="flex-grow:1;"></div>
                                        <?php endif; ?>

                                        <!-- Price + CTA -->
                                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                                            <span class="fw-bold" style="color:#c8a96e;font-size:0.9rem;">
                                                <?php if (! empty($p['price_label'])): ?>
                                                    <?= esc($p['price_label']) ?>
                                                <?php elseif (! empty($p['price'])): ?>
                                                    <?= number_format((float)$p['price'], 0, ',', '.') ?>đ
                                                <?php else: ?>
                                                    Liên hệ báo giá
                                                <?php endif; ?>
                                            </span>
                                            <a href="<?= base_url('san-pham/' . $p['slug']) ?>"
                                               class="btn btn-sm rounded-pill px-3"
                                               style="background:#1a1a1a;color:#fff;font-size:0.8rem;">
                                                Xem chi tiết <i class="bi bi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5" data-aos="fade-up">
                        <i class="bi bi-inbox fs-1 text-muted opacity-50 d-block mb-3"></i>
                        <h5 class="text-muted">Chưa có sản phẩm nào trong nhóm này.</h5>
                        <a href="<?= base_url('san-pham') ?>" class="btn rounded-pill px-4 mt-3" style="background:#1a1a1a;color:#fff;">
                            Xem tất cả sản phẩm
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background:linear-gradient(135deg,#1a1a1a 0%,#3d2b1f 100%);">
    <div class="container text-center" data-aos="fade-up" data-aos-duration="700">
        <h3 class="text-white fw-bold mb-3">Cần tư vấn sản phẩm phù hợp?</h3>
        <p class="text-white-50 mb-4">Đội ngũ chuyên gia của Ngân Gia Nguyễn sẵn sàng hỗ trợ bạn 24/7</p>
        <a href="<?= base_url('lien-he') ?>" class="btn rounded-pill px-5 py-3 fw-semibold me-3" style="background:#c8a96e;color:#1a1a1a;">
            <i class="bi bi-telephone-fill me-2"></i>Liên hệ ngay
        </a>
        <a href="<?= base_url('gioi-thieu') ?>" class="btn btn-outline-light rounded-pill px-5 py-3 fw-semibold">
            <i class="bi bi-info-circle me-2"></i>Về chúng tôi
        </a>
    </div>
</section>

<style>
.product-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.product-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,0.12) !important; }
.product-card:hover .product-card-img { transform: scale(1.06); }
.product-card:hover .product-card-overlay { opacity: 1 !important; }
.list-group-item.active { background: linear-gradient(135deg,#1a1a1a,#3d2b1f) !important; border-color: transparent !important; color: #fff !important; }
.list-group-item { border-left: none; border-right: none; padding: 0.85rem 1.25rem; }
</style>

<?= $this->endSection() ?>
