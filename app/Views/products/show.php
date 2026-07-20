<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Breadcrumb Hero -->
<section class="page-hero-section position-relative overflow-hidden" style="background:linear-gradient(135deg,#1a1a1a 0%,#3d2b1f 100%);padding:70px 0 50px;">
    <div class="container position-relative z-1">
        <nav aria-label="breadcrumb" class="mb-3" data-aos="fade-right" data-aos-duration="600">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white-50 text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('san-pham') ?>" class="text-white-50 text-decoration-none">Sản phẩm</a></li>
                <?php if (! empty($product['category_title'])): ?>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('san-pham/nhom/' . $product['category_slug']) ?>" class="text-white-50 text-decoration-none">
                            <?= esc($product['category_title']) ?>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="breadcrumb-item active text-white" aria-current="page"><?= esc(mb_strimwidth($product['title'], 0, 50, '…')) ?></li>
            </ol>
        </nav>
    </div>
    <div class="position-absolute top-0 end-0 opacity-10" style="width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,#c8a96e,transparent);transform:translate(30%,-30%);"></div>
</section>

<!-- Product Detail -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">

            <!-- LEFT: Image Gallery -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">

                <!-- Main image / Swiper -->
                <?php
                $allImages = [];
                if (! empty($product['cover_image'])) {
                    $allImages[] = ['file_path' => $product['cover_image'], 'caption' => $product['title']];
                }
                foreach ($images as $img) {
                    $allImages[] = $img;
                }
                ?>

                <?php if (! empty($allImages)): ?>
                    <div class="product-gallery mb-3">
                        <div class="swiper product-main-swiper rounded-4 overflow-hidden shadow"
                             style="height:420px;background:#f8f6f2;">
                            <div class="swiper-wrapper">
                                <?php foreach ($allImages as $img): ?>
                                    <div class="swiper-slide">
                                        <a href="<?= base_url($img['file_path']) ?>"
                                           data-fancybox="product-gallery"
                                           data-caption="<?= esc($img['caption'] ?? $product['title']) ?>">
                                            <img src="<?= base_url($img['file_path']) ?>"
                                                 alt="<?= esc($img['caption'] ?? $product['title']) ?>"
                                                 style="width:100%;height:420px;object-fit:contain;padding:16px;"
                                                 loading="lazy">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>

                        <!-- Thumbnail strip -->
                        <?php if (count($allImages) > 1): ?>
                        <div class="swiper product-thumb-swiper mt-3" style="height:74px;">
                            <div class="swiper-wrapper">
                                <?php foreach ($allImages as $img): ?>
                                    <div class="swiper-slide">
                                        <div class="rounded-3 overflow-hidden border border-2 border-transparent thumb-item" style="height:70px;cursor:pointer;">
                                            <img src="<?= base_url($img['file_path']) ?>"
                                                 alt=""
                                                 style="width:100%;height:100%;object-fit:cover;">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="rounded-4 d-flex align-items-center justify-content-center"
                         style="height:380px;background:#f8f6f2;">
                        <i class="bi bi-image text-muted" style="font-size:5rem;opacity:0.2;"></i>
                    </div>
                <?php endif; ?>

                <!-- Video Section -->
                <?php if (! empty($videos)): ?>
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-play-btn me-2 text-primary"></i>Video sản phẩm</h6>
                        <div class="row g-3">
                            <?php foreach ($videos as $vid): ?>
                                <?php
                                $embedUrl = '';
                                $rawUrl   = $vid['video_url'];
                                // Convert YouTube watch/short links to embed
                                if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/', $rawUrl, $m)) {
                                    $embedUrl = 'https://www.youtube.com/embed/' . $m[1];
                                } elseif (preg_match('/vimeo\.com\/(\d+)/', $rawUrl, $m)) {
                                    $embedUrl = 'https://player.vimeo.com/video/' . $m[1];
                                }
                                ?>
                                <?php if ($embedUrl): ?>
                                    <div class="col-12">
                                        <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                                            <iframe src="<?= esc($embedUrl) ?>"
                                                    title="<?= esc($vid['caption'] ?: 'Video sản phẩm') ?>"
                                                    allowfullscreen loading="lazy"
                                                    class="rounded-4"></iframe>
                                        </div>
                                        <?php if (! empty($vid['caption'])): ?>
                                            <p class="text-muted small mt-1 mb-0"><?= esc($vid['caption']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- RIGHT: Product Info -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">

                <!-- Category badge -->
                <?php if (! empty($product['category_title'])): ?>
                    <a href="<?= base_url('san-pham/nhom/' . $product['category_slug']) ?>"
                       class="badge text-decoration-none mb-3 rounded-pill px-3 py-2"
                       style="background:rgba(200,169,110,0.15);color:#c8a96e;border:1px solid rgba(200,169,110,0.4);font-size:0.78rem;">
                        <i class="bi bi-tag me-1"></i><?= esc($product['category_title']) ?>
                    </a>
                <?php endif; ?>

                <h1 class="fw-bold mb-2" style="font-size:1.6rem;line-height:1.3;color:#1a1a1a;">
                    <?= esc($product['title']) ?>
                </h1>

                <!-- SKU & Status -->
                <div class="d-flex align-items-center gap-3 mb-3">
                    <?php if (! empty($product['sku'])): ?>
                        <span class="text-muted small"><i class="bi bi-upc me-1"></i>Mã: <code><?= esc($product['sku']) ?></code></span>
                    <?php endif; ?>
                    <?php if ($product['is_featured']): ?>
                        <span class="badge bg-warning text-dark rounded-pill px-2 py-1" style="font-size:0.7rem;">
                            <i class="bi bi-star-fill me-1"></i>Nổi bật
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Price -->
                <div class="product-price mb-4 pb-4 border-bottom">
                    <?php if (! empty($product['price_label'])): ?>
                        <span class="fw-bold" style="font-size:1.6rem;color:#c8a96e;"><?= esc($product['price_label']) ?></span>
                    <?php elseif (! empty($product['price'])): ?>
                        <span class="fw-bold" style="font-size:1.6rem;color:#c8a96e;">
                            <?= number_format((float)$product['price'], 0, ',', '.') ?>đ
                        </span>
                    <?php else: ?>
                        <span class="fw-bold" style="font-size:1.4rem;color:#c8a96e;">Liên hệ báo giá</span>
                    <?php endif; ?>
                </div>

                <!-- Summary -->
                <?php if (! empty($product['summary'])): ?>
                    <p class="text-muted mb-4" style="line-height:1.8;"><?= esc($product['summary']) ?></p>
                <?php endif; ?>

                <!-- Technical Specs Table -->
                <?php if (! empty($specs)): ?>
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color:#1a1a1a;">
                            <i class="bi bi-list-check me-2" style="color:#c8a96e;"></i>Thông số kỹ thuật
                        </h6>
                        <div class="table-responsive rounded-3 border overflow-hidden">
                            <table class="table table-sm table-hover mb-0">
                                <tbody>
                                    <?php foreach ($specs as $key => $value): ?>
                                        <tr>
                                            <td class="fw-semibold text-muted" style="width:45%;background:#fafaf8;padding:10px 16px;font-size:0.875rem;">
                                                <?= esc($key) ?>
                                            </td>
                                            <td style="padding:10px 16px;font-size:0.875rem;"><?= esc($value) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- CTA Buttons -->
                <div class="d-flex gap-3 flex-wrap mt-4">
                    <a href="<?= base_url('lien-he') ?>"
                       class="btn rounded-pill px-5 py-3 fw-semibold"
                       style="background:#1a1a1a;color:#fff;flex:1;text-align:center;">
                        <i class="bi bi-telephone-fill me-2"></i>Liên hệ đặt hàng
                    </a>
                    <a href="https://zalo.me/<?= esc(get_setting('zalo_phone') ?: (get_setting('zalo') ?: get_setting('phone'))) ?>"
                       target="_blank" rel="noopener"
                       class="btn rounded-pill px-4 py-3 fw-semibold"
                       style="background:#0068ff;color:#fff;min-width:130px;text-align:center;">
                        <i class="bi bi-chat-dots-fill me-2"></i>Zalo
                    </a>
                </div>

                <!-- Social share -->
                <div class="mt-4 d-flex align-items-center gap-2">
                    <small class="text-muted">Chia sẻ:</small>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>"
                       target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle" style="width:34px;height:34px;padding:0;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://zalo.me/share/url?url=<?= urlencode(current_url()) ?>"
                       target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle" style="width:34px;height:34px;padding:0;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-chat-square-dots-fill" style="color:#0068ff;"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Detail Content -->
        <?php if (! empty($product['content'])): ?>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4" data-aos="fade-up" data-aos-duration="700">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h5 class="mb-0 fw-bold"><i class="bi bi-file-richtext me-2 text-primary"></i>Thông tin chi tiết sản phẩm</h5>
                        </div>
                        <div class="card-body p-4 p-lg-5">
                            <div class="product-content" style="line-height:1.9;color:#444;">
                                <?= $product['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Related Products -->
        <?php if (! empty($related)): ?>
            <div class="mt-5 pt-4 border-top" data-aos="fade-up" data-aos-duration="700">
                <h4 class="fw-bold mb-4 text-center">Sản phẩm cùng nhóm</h4>
                <div class="row g-4">
                    <?php foreach ($related as $idx => $rp): ?>
                        <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="<?= $idx * 80 ?>">
                            <div class="product-card card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                                <div class="product-card-img-wrap position-relative overflow-hidden" style="height:180px;">
                                    <?php if (! empty($rp['cover_image'])): ?>
                                        <img src="<?= base_url($rp['cover_image']) ?>" alt="<?= esc($rp['title']) ?>"
                                             style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s ease;"
                                             class="product-card-img" loading="lazy">
                                    <?php else: ?>
                                        <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background:#f8f6f2;">
                                            <i class="bi bi-image text-muted" style="font-size:2.5rem;opacity:0.3;"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="product-card-overlay position-absolute d-flex align-items-center justify-content-center"
                                         style="top:0;left:0;right:0;bottom:0;background:rgba(26,26,26,0.55);opacity:0;transition:opacity 0.3s ease;">
                                        <a href="<?= base_url('san-pham/' . $rp['slug']) ?>"
                                           class="btn btn-sm text-white rounded-pill px-3" style="border:2px solid #c8a96e;font-size:0.8rem;">
                                            <i class="bi bi-eye me-1"></i>Xem
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="fw-bold mb-1" style="font-size:0.85rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                        <?= esc($rp['title']) ?>
                                    </h6>
                                    <p class="mb-0 fw-semibold" style="color:#c8a96e;font-size:0.8rem;">
                                        <?php if (! empty($rp['price_label'])): echo esc($rp['price_label']);
                                        elseif (! empty($rp['price'])): echo number_format((float)$rp['price'], 0, ',', '.') . 'đ';
                                        else: echo 'Liên hệ'; endif; ?>
                                    </p>
                                </div>
                                <a href="<?= base_url('san-pham/' . $rp['slug']) ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- SwiperJS + Fancybox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fancybox
    Fancybox.bind('[data-fancybox="product-gallery"]', { animated: true });

    // Thumbnail swiper
    const thumbSwiper = new Swiper('.product-thumb-swiper', {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesProgress: true,
    });

    // Main swiper
    const mainSwiper = new Swiper('.product-main-swiper', {
        spaceBetween: 10,
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        pagination: { el: '.swiper-pagination', clickable: true },
        thumbs: { swiper: thumbSwiper },
        on: {
            slideChange: function () {
                document.querySelectorAll('.thumb-item').forEach((el, i) => {
                    el.style.borderColor = (i === this.realIndex) ? '#c8a96e' : 'transparent';
                });
            }
        }
    });

    // Thumb click → slide main
    document.querySelectorAll('.thumb-item').forEach((el, i) => {
        el.addEventListener('click', () => mainSwiper.slideTo(i));
    });

    // Activate first thumb
    const firstThumb = document.querySelector('.thumb-item');
    if (firstThumb) firstThumb.style.borderColor = '#c8a96e';
});
</script>

<style>
.product-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
.product-card:hover { transform: translateY(-5px); box-shadow: 0 16px 40px rgba(0,0,0,0.12) !important; }
.product-card:hover .product-card-img { transform: scale(1.06); }
.product-card:hover .product-card-overlay { opacity: 1 !important; }
.product-content img { max-width: 100%; height: auto; border-radius: 8px; }
.swiper-button-next, .swiper-button-prev { color: #c8a96e !important; }
.swiper-pagination-bullet-active { background: #c8a96e !important; }
</style>

<?= $this->endSection() ?>
