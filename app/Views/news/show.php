<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$mainNewsImageRaw = (string) ($news['image'] ?? '');
$mainNewsImagePath = '';
$mainNewsImageUrl = '';
if ($mainNewsImageRaw !== '') {
    if (strpos($mainNewsImageRaw, 'uploads/') === 0) {
        $mainNewsImagePath = FCPATH . $mainNewsImageRaw;
        $mainNewsImageUrl = base_url($mainNewsImageRaw);
    } else {
        $mainNewsImagePath = FCPATH . 'uploads/news/' . $mainNewsImageRaw;
        $mainNewsImageUrl = base_url('uploads/news/' . $mainNewsImageRaw);
    }
}
$hasMainImage = !empty($mainNewsImagePath) && file_exists($mainNewsImagePath);
?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1>Tin Tức & Sự Kiện</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('tin-tuc') ?>">Tin tức</a></li>
                <li class="breadcrumb-item active text-truncate" style="max-width: 300px;" aria-current="page"><?= esc($news['title']) ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- News Detail Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <!-- Left content column -->
            <div class="col-lg-8" data-aos="fade-right">
                <article class="news-detail-wrapper">
                    
                    <!-- Article Meta & Title -->
                    <div class="news-detail-header mb-4">
                        <div class="d-flex align-items-center gap-3 flex-wrap text-muted small mb-3">
                            <?php if (!empty($category['title'])): ?>
                                <a href="<?= base_url('tin-tuc/danh-muc/' . esc($category['slug'] ?? '')) ?>" class="badge bg-primary text-white text-decoration-none px-3 py-2 rounded-pill">
                                    <i class="bi bi-folder-fill me-1"></i> <?= esc($category['title']) ?>
                                </a>
                            <?php else: ?>
                                <span class="badge bg-primary text-white px-3 py-2 rounded-pill">
                                    <i class="bi bi-folder-fill me-1"></i> Tin hoạt động
                                </span>
                            <?php endif; ?>
                            <span><i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($news['published_at'] ?? $news['created_at'])) ?></span>
                        </div>

                        <h1 class="news-detail-title fw-bold mb-3"><?= esc($news['title']) ?></h1>

                        <?php if (!empty($news['summary'])): ?>
                            <div class="news-detail-summary lead p-3 rounded-3 mb-4">
                                <?= esc($news['summary']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Main Image (if available) -->
                    <?php if ($hasMainImage): ?>
                        <div class="news-detail-main-img mb-4 rounded-4 overflow-hidden shadow-sm">
                            <img src="<?= $mainNewsImageUrl ?>" alt="<?= esc($news['title']) ?>" class="img-fluid w-100">
                        </div>
                    <?php endif; ?>

                    <!-- Content printed as HTML -->
                    <div class="content-body">
                        <?= $newsContentHtml ?? ($news['content'] ?? '') ?>
                    </div>

                    <!-- Tags -->
                    <?php if (!empty($news['tags'])): ?>
                        <div class="mt-5 border-top pt-4">
                            <h6 class="fw-bold d-inline-block me-3 text-uppercase text-muted"><i class="bi bi-tags-fill text-primary"></i> Từ khóa:</h6>
                            <?php 
                                $tags = explode(',', $news['tags']);
                                foreach ($tags as $tag):
                                    $trimmedTag = trim($tag);
                                    if (!empty($trimmedTag)):
                            ?>
                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill me-2 mb-2"><?= esc($trimmedTag) ?></span>
                            <?php 
                                    endif;
                                endforeach; 
                            ?>
                        </div>
                    <?php endif; ?>

                    <!-- Share / Back navigation -->
                    <div class="d-flex align-items-center justify-content-between border-top border-bottom py-3 mt-4">
                        <a href="<?= base_url('tin-tuc') ?>" class="btn btn-outline-secondary rounded-pill btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Quay lại danh sách tin
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <span class="small text-muted me-1">Chia sẻ:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= rawurlencode(current_url()) ?>" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary rounded-circle" title="Chia sẻ Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://zalo.me/share?url=<?= rawurlencode(current_url()) ?>" target="_blank" rel="noopener" class="btn btn-sm btn-outline-info rounded-circle" title="Chia sẻ Zalo">
                                <i class="bi bi-chat-dots-fill"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            
            <!-- Right sidebar column -->
            <div class="col-lg-4" data-aos="fade-left">
                <!-- Related News Widget -->
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 news-sidebar-card">
                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-primary-color">Tin Tức Liên Quan</h5>
                    <div class="d-flex flex-column gap-3">
                        <?php if (!empty($relatedNews)): ?>
                            <?php foreach ($relatedNews as $related): ?>
                                <?php
                                $relatedImageRaw = (string) ($related['image'] ?? '');
                                $relatedImagePath = '';
                                $relatedImageUrl = '';
                                if ($relatedImageRaw !== '') {
                                    if (strpos($relatedImageRaw, 'uploads/') === 0) {
                                        $relatedImagePath = FCPATH . $relatedImageRaw;
                                        $relatedImageUrl = base_url($relatedImageRaw);
                                    } else {
                                        $relatedImagePath = FCPATH . 'uploads/news/' . $relatedImageRaw;
                                        $relatedImageUrl = base_url('uploads/news/' . $relatedImageRaw);
                                    }
                                }
                                ?>
                                <div class="d-flex gap-3 align-items-start border-bottom pb-3 news-related-item">
                                    <div class="rounded overflow-hidden flex-shrink-0" style="width: 75px; height: 60px; background: #e9ecef;">
                                        <?php if (!empty($relatedImagePath) && file_exists($relatedImagePath)): ?>
                                            <img src="<?= $relatedImageUrl ?>" alt="<?= esc($related['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                        <?php else: ?>
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                                <i class="bi bi-newspaper fs-4"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-semibold" style="font-size: 0.88rem; line-height: 1.35;">
                                            <a href="<?= base_url('tin-tuc/' . esc($related['slug'])) ?>" class="text-decoration-none text-heading hover-primary"><?= esc($related['title']) ?></a>
                                        </h6>
                                        <small class="text-muted" style="font-size: 0.78rem;"><i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($related['published_at'] ?? $related['created_at'])) ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted small mb-0">Không có tin tức liên quan nào khác.</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Contact Widget -->
                <div class="card border-0 shadow-sm rounded-4 p-4 text-white text-center" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
                    <i class="bi bi-headset display-4 mb-2 opacity-75"></i>
                    <h5 class="fw-bold mb-2">Tư Vấn Trực Tuyến</h5>
                    <p class="mb-4 text-white-50 small">Liên hệ ngay với Nội Thất Ngân Gia Nguyễn để nhận tư vấn và báo giá chi tiết cho công trình của bạn.</p>
                    <?php $zaloPhone = get_setting('zalo_phone') ?: (get_setting('zalo') ?: get_setting('phone')); ?>
                    <a href="https://zalo.me/<?= esc($zaloPhone) ?>" target="_blank" rel="noopener" class="btn btn-light btn-custom w-100 rounded-pill fw-bold">
                        <i class="bi bi-chat-dots-fill text-primary me-1"></i> Liên Hệ Zalo
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
