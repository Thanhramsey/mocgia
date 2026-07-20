<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
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

// ─── Build album map: slug → [title, images[], cover_url, video_count] ───────
$albumMap = [];
if (!empty($albums)) {
    foreach ($albums as $alb) {
        $albumMap[$alb['slug']] = [
            'title'       => $alb['title'],
            'slug'        => $alb['slug'],
            'images'      => [],
            'cover_url'   => '',
            'image_count' => 0,
            'video_count' => 0,
        ];
    }
}
// Also capture "uncategorised" images
$albumMap['__uncategorised__'] = [
    'title'       => 'Hình ảnh khác',
    'slug'        => '__uncategorised__',
    'images'      => [],
    'cover_url'   => '',
    'image_count' => 0,
    'video_count' => 0,
];

if (!empty($images)) {
    foreach ($images as $img) {
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
            'title'      => $img['title'] ?? '',
            'preview'    => $previewUrl,
            'open_url'   => $openUrl,
            'image_url'  => $imageUrl,
            'is_video'   => $isVideo,
            'has_preview'=> $hasPreview,
            'album_slug' => $albSlug,
        ];

        if (isset($albumMap[$albSlug])) {
            $albumMap[$albSlug]['images'][] = $entry;
            if ($isVideo) {
                $albumMap[$albSlug]['video_count']++;
            } else {
                $albumMap[$albSlug]['image_count']++;
                if (empty($albumMap[$albSlug]['cover_url']) && !empty($imageUrl)) {
                    $albumMap[$albSlug]['cover_url'] = $imageUrl;
                }
            }
        } else {
            $albumMap['__uncategorised__']['images'][] = $entry;
            if ($isVideo) {
                $albumMap['__uncategorised__']['video_count']++;
            } else {
                $albumMap['__uncategorised__']['image_count']++;
                if (empty($albumMap['__uncategorised__']['cover_url']) && !empty($imageUrl)) {
                    $albumMap['__uncategorised__']['cover_url'] = $imageUrl;
                }
            }
        }
    }
}

// Remove empty albums (no images and no videos)
$albumMap = array_filter($albumMap, fn($a) => (count($a['images']) > 0));
?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1 id="gallery-page-title">Thư Viện Ảnh</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" id="gallery-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="bc-gallery">Thư viện ảnh</li>
                <li class="breadcrumb-item active d-none" aria-current="page" id="bc-album"></li>
            </ol>
        </nav>
    </div>
</div>

<section class="section-padding">
    <div class="container">

        <!-- ═══ VIEW 1: ALBUM CARDS GRID ═══ -->
        <div id="view-albums">
            <div class="row g-4" id="album-cards-grid">

                <?php if (!empty($albumMap)): ?>
                    <?php foreach ($albumMap as $slug => $alb): ?>
                        <?php
                        $totalCount = $alb['image_count'] + $alb['video_count'];
                        $hasCover   = !empty($alb['cover_url']);
                        ?>
                        <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                            <div class="album-card" data-album-slug="<?= esc($slug) ?>" role="button" tabindex="0" aria-label="Xem album <?= esc($alb['title']) ?>">
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
                                            <i class="bi bi-folder2-open me-2"></i>Mở Album
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
                                    <span class="album-card-sub"><?= $totalCount ?> mục &nbsp;·&nbsp; <span class="text-primary">Xem tất cả <i class="bi bi-arrow-right"></i></span></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-images display-1 text-muted opacity-25 d-block mb-4"></i>
                        <h4 class="text-muted">Chưa có album nào</h4>
                        <p class="text-muted">Hãy quay lại sau để xem các công trình mới nhất của chúng tôi.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <!-- ═══ end VIEW 1 ═══ -->

        <!-- ═══ VIEW 2: IMAGES IN ALBUM ═══ -->
        <div id="view-images" class="d-none">

            <!-- Back Button + Album header -->
            <div class="d-flex align-items-center gap-3 mb-4 flex-wrap">
                <button type="button" id="backToAlbums" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i>Danh sách Album
                </button>
                <div>
                    <h4 class="mb-0 fw-bold" id="album-view-title"></h4>
                    <small class="text-muted" id="album-view-count"></small>
                </div>
                <button type="button" id="openFlipbookAll" class="btn btn-primary rounded-pill px-4 py-2 ms-auto">
                    <i class="bi bi-journal-album me-2"></i>Lật Album Ảnh (3D)
                </button>
            </div>

            <!-- Image grid -->
            <div class="row g-3" id="album-image-grid">
                <!-- Populated by JS -->
            </div>
        </div>
        <!-- ═══ end VIEW 2 ═══ -->

    </div>
</section>

<!-- ─── Flipbook dataset (PHP → JS) ─────────────────────────────── -->
<?php
$jsAlbumData = [];
foreach ($albumMap as $slug => $alb) {
    // all_items = everything (photos + videos), photo_items = photos only (for flipbook)
    $jsAlbumData[$slug] = [
        'title'       => $alb['title'],
        'all_items'   => array_values($alb['images']),
        'photo_items' => array_values(array_filter($alb['images'], fn($i) => !$i['is_video'])),
    ];
}
?>

<script>
(function () {
    'use strict';

    const ALBUM_DATA = <?= json_encode($jsAlbumData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

    let currentAlbumSlug = null;

    // ─── DOM refs ─────────────────────────────────────────────────
    const viewAlbums     = document.getElementById('view-albums');
    const viewImages     = document.getElementById('view-images');
    const backBtn        = document.getElementById('backToAlbums');
    const albumViewTitle = document.getElementById('album-view-title');
    const albumViewCount = document.getElementById('album-view-count');
    const imageGrid      = document.getElementById('album-image-grid');
    const openAllFlipBtn = document.getElementById('openFlipbookAll');
    const bcAlbum        = document.getElementById('bc-album');
    const bcGallery      = document.getElementById('bc-gallery');
    const pageTitle      = document.getElementById('gallery-page-title');

    // ─── Open album view ──────────────────────────────────────────
    function openAlbum(slug, animate = true) {
        const alb = ALBUM_DATA[slug];
        if (!alb) return;

        currentAlbumSlug = slug;

        // Update breadcrumb
        bcAlbum.textContent = alb.title;
        bcAlbum.classList.remove('d-none');
        bcGallery.setAttribute('role', 'button');
        bcGallery.style.cursor = 'pointer';
        pageTitle.textContent = alb.title;

        // Build image+video grid HTML
        const allItems   = alb.all_items   || [];
        const photoItems = alb.photo_items || [];
        let html = '';

        if (allItems.length === 0) {
            html = `<div class="col-12 text-center py-5"><i class="bi bi-image-fill display-1 text-muted opacity-25 mb-4 d-block"></i><p class="text-muted">Album chưa có nội dung.</p></div>`;
        } else {
            // Track photo index separately (for flipbook start position)
            let photoIdx = 0;
            allItems.forEach((item, idx) => {
                const isVideo = !!item.is_video;
                const src     = item.preview || item.image_url || '';
                const caption = item.title || (isVideo ? 'Video ' + (idx + 1) : 'Ảnh ' + (idx + 1));

                if (isVideo) {
                    html += `
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="album-img-card album-video-card" data-video-url="${escapeHTML(item.open_url)}" data-caption="${escapeHTML(caption)}" role="button" tabindex="0" aria-label="Xem video: ${escapeHTML(caption)}">
                            <div class="album-img-thumb">
                                ${src ? `<img src="${src}" alt="${escapeHTML(caption)}" loading="lazy">` : `<div class="d-flex align-items-center justify-content-center h-100" style="background:#111"><i class="bi bi-play-circle text-white fs-1"></i></div>`}
                                <div class="album-img-overlay album-video-overlay">
                                    <i class="bi bi-play-circle-fill"></i>
                                </div>
                                <span class="album-video-badge"><i class="bi bi-play-fill me-1"></i>Video</span>
                            </div>
                            ${caption ? `<div class="album-img-caption">${escapeHTML(caption)}</div>` : ''}
                        </div>
                    </div>`;
                } else {
                    const pIdx = photoIdx;
                    photoIdx++;
                    html += `
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="album-img-card" data-photo-idx="${pIdx}" data-img-url="${item.image_url}" data-caption="${escapeHTML(caption)}" role="button" tabindex="0" aria-label="${escapeHTML(caption)}">
                            <div class="album-img-thumb">
                                ${src ? `<img src="${src}" alt="${escapeHTML(caption)}" loading="lazy">` : `<div class="d-flex align-items-center justify-content-center h-100"><i class="bi bi-image text-muted fs-2"></i></div>`}
                                <div class="album-img-overlay">
                                    <i class="bi bi-journal-album"></i>
                                </div>
                            </div>
                            ${caption ? `<div class="album-img-caption">${escapeHTML(caption)}</div>` : ''}
                        </div>
                    </div>`;
                }
            });
        }

        const photoCount = photoItems.length;
        const videoCount = allItems.length - photoCount;
        const countParts = [];
        if (photoCount > 0) countParts.push(photoCount + ' ảnh');
        if (videoCount > 0) countParts.push(videoCount + ' video');

        imageGrid.innerHTML = html;
        albumViewTitle.textContent = alb.title;
        albumViewCount.textContent = countParts.join('  ·  ');
        openAllFlipBtn.style.display = photoCount === 0 ? 'none' : '';

        // Transition
        if (animate) {
            viewAlbums.style.opacity = '0';
            viewAlbums.style.transform = 'translateX(-30px)';
            setTimeout(() => {
                viewAlbums.classList.add('d-none');
                viewImages.classList.remove('d-none');
                viewImages.style.opacity = '0';
                viewImages.style.transform = 'translateX(30px)';
                requestAnimationFrame(() => {
                    viewImages.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
                    viewImages.style.opacity = '1';
                    viewImages.style.transform = 'translateX(0)';
                });
            }, 280);
        } else {
            viewAlbums.classList.add('d-none');
            viewImages.classList.remove('d-none');
        }

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // ─── Back to album list ───────────────────────────────────────
    function goBackToAlbums() {
        currentAlbumSlug = null;
        bcAlbum.classList.add('d-none');
        bcGallery.removeAttribute('role');
        bcGallery.style.cursor = '';
        pageTitle.textContent = 'Thư Viện Ảnh';

        viewImages.style.opacity = '0';
        viewImages.style.transform = 'translateX(30px)';
        setTimeout(() => {
            viewImages.classList.add('d-none');
            viewAlbums.classList.remove('d-none');
            viewAlbums.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
            viewAlbums.style.opacity = '1';
            viewAlbums.style.transform = 'translateX(0)';
        }, 280);
    }

    // ─── Album card click ─────────────────────────────────────────
    document.getElementById('album-cards-grid').addEventListener('click', function (e) {
        const card = e.target.closest('.album-card[data-album-slug]');
        if (!card) return;
        openAlbum(card.getAttribute('data-album-slug'));
    });
    document.getElementById('album-cards-grid').addEventListener('keydown', function (e) {
        if (e.key !== 'Enter' && e.key !== ' ') return;
        const card = e.target.closest('.album-card[data-album-slug]');
        if (!card) return;
        e.preventDefault();
        openAlbum(card.getAttribute('data-album-slug'));
    });

    // ─── Back button ──────────────────────────────────────────────
    backBtn.addEventListener('click', goBackToAlbums);
    bcGallery.addEventListener('click', function () {
        if (!bcAlbum.classList.contains('d-none')) goBackToAlbums();
    });

    // ─── Image card click → flipbook | Video card → Fancybox iframe ─
    function handleGridItemClick(e) {
        // Video card
        const videoCard = e.target.closest('.album-video-card[data-video-url]');
        if (videoCard) {
            e.preventDefault();
            const url     = videoCard.getAttribute('data-video-url');
            const caption = videoCard.getAttribute('data-caption') || '';
            // Use Fancybox to play YouTube embed in a fullscreen iframe
            Fancybox.show([{ src: url, type: 'iframe', caption }]);
            return;
        }
        // Photo card
        const photoCard = e.target.closest('.album-img-card[data-photo-idx]');
        if (photoCard) {
            const pIdx = parseInt(photoCard.getAttribute('data-photo-idx') || '0', 10);
            openFlipbookForAlbum(currentAlbumSlug, pIdx);
        }
    }
    imageGrid.addEventListener('click', handleGridItemClick);
    imageGrid.addEventListener('keydown', function (e) {
        if (e.key !== 'Enter' && e.key !== ' ') return;
        handleGridItemClick(e);
    });

    // ─── "Lật Album Ảnh (3D)" button → open all images ───────────
    openAllFlipBtn.addEventListener('click', function () {
        openFlipbookForAlbum(currentAlbumSlug, 0);
    });

    // ─── Helper: open flipbook for a specific album (photos only) ───
    function openFlipbookForAlbum(slug, startIndex) {
        const alb = ALBUM_DATA[slug];
        if (!alb || !alb.photo_items || alb.photo_items.length === 0) return;

        const imagesForFlip = alb.photo_items.map(img => ({
            url:     img.image_url,
            caption: img.title
        }));
        openAlbumFlipbook(imagesForFlip, alb.title, startIndex);
    }

    // ─── Helper: XSS-safe HTML escaping ──────────────────────────
    function escapeHTML(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
    }

    // Initial transition CSS setup
    viewAlbums.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    viewImages.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
})();
</script>

<?= $this->endSection() ?>
