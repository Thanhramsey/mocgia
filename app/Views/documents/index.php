<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="section-title-wrapper text-center mb-4">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc(lang('Site.legal_docs')) ?></span>
            <h1 class="section-title"><?= esc(lang('Site.company_documents')) ?></h1>
        </div>

        <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
            <a href="<?= base_url('giay-to') ?>" class="btn rounded-pill <?= empty($activeSlug) ? 'btn-primary' : 'btn-outline-primary' ?>"><?= esc(lang('Site.all')) ?></a>
            <?php foreach ($categories as $cat): ?>
                <a href="<?= base_url('giay-to/loai/' . $cat['slug']) ?>" class="btn rounded-pill <?= ($activeSlug === $cat['slug']) ? 'btn-primary' : 'btn-outline-primary' ?>"><?= esc($cat['title']) ?></a>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php if (!empty($documents)): ?>
                <?php foreach ($documents as $doc): ?>
                    <?php
                    $fileName = $doc['file_attachment'] ?: ($doc['pdf_attachment'] ?? '');
                    $fileUrl = '';
                    $fileExt = '';
                    $isImageFile = false;
                    $isPdfFile = false;
                    if (!empty($fileName)) {
                        $fileExt = strtolower((string) pathinfo($fileName, PATHINFO_EXTENSION));
                        $mime = strtolower((string) ($doc['file_mime'] ?? ''));
                        $isImageFile = strpos($mime, 'image/') === 0 || in_array($fileExt, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true);
                        $isPdfFile = ($fileExt === 'pdf') || ($mime === 'application/pdf');

                        if (file_exists(FCPATH . 'uploads/documents/' . $fileName)) {
                            $fileUrl = base_url('uploads/documents/' . $fileName);
                        }
                    }

                    $imageUrl = '';
                    if (!empty($doc['image'])) {
                        if (file_exists(FCPATH . 'uploads/documents/' . $doc['image'])) {
                            $imageUrl = base_url('uploads/documents/' . $doc['image']);
                        }
                    }

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
                    }
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                            <div class="ratio ratio-16x9 bg-white d-flex align-items-center justify-content-center border-bottom">
                                <?php if (!empty($imageUrl) && !$isPdfFile): ?>
                                    <a href="<?= $imageUrl ?>" data-fancybox="all-docs" data-caption="<?= esc($doc['title']) ?>" class="d-block w-100 h-100 text-decoration-none">
                                        <img src="<?= $imageUrl ?>" alt="<?= esc($doc['title']) ?>" style="width:100%;height:100%;object-fit:contain;">
                                    </a>
                                <?php elseif ($isPdfFile && !empty($fileUrl)): ?>
                                    <a href="#" data-doc-viewer="<?= $fileUrl ?>" data-doc-title="<?= esc($doc['title']) ?>" class="d-block w-100 h-100 text-decoration-none position-relative">
                                        <?php if (!empty($imageUrl)): ?>
                                            <img src="<?= $imageUrl ?>" alt="<?= esc($doc['title']) ?>" style="width:100%;height:100%;object-fit:contain;">
                                            <span class="position-absolute top-50 start-50 translate-middle bg-dark bg-opacity-75 text-white rounded-pill px-3 py-1 small">
                                                <i class="bi bi-file-earmark-pdf text-danger me-1"></i> Xem PDF
                                            </span>
                                        <?php else: ?>
                                            <div class="d-flex flex-column align-items-center justify-content-center w-100 h-100 p-3">
                                                <i class="bi bi-file-earmark-pdf text-danger display-4 mb-2"></i>
                                                <span class="fw-bold text-dark">FILE PDF</span>
                                                <span class="text-muted small">Nhấn để xem tài liệu</span>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= $targetViewUrl ?>" data-fancybox="all-docs" data-caption="<?= esc($doc['title']) ?>" class="d-flex flex-column align-items-center justify-content-center text-decoration-none w-100 h-100 p-3">
                                        <i class="bi <?= esc($fileIcon) ?> <?= esc($fileIconClass) ?>" style="font-size:3rem;"></i>
                                        <span class="small text-muted mt-2 fw-semibold"><?= esc($fileLabel) ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <span class="badge bg-primary-subtle text-primary mb-2"><?= esc($doc['category_title'] ?? lang('Site.documents')) ?></span>
                                    <h5 class="fw-bold mb-2" style="font-size:0.95rem; line-height: 1.35;"><?= esc($doc['title']) ?></h5>
                                    <?php if (!empty($doc['organization']) || !empty($doc['issue_date'])): ?>
                                        <div class="small text-muted mb-3">
                                            <?php if (!empty($doc['organization'])): ?><div><i class="bi bi-building me-1"></i><?= esc($doc['organization']) ?></div><?php endif; ?>
                                            <?php if (!empty($doc['issue_date'])): ?><div><i class="bi bi-calendar3 me-1"></i><?= date('d/m/Y', strtotime($doc['issue_date'])) ?></div><?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex gap-2 mt-2">
                                    <?php if ($isPdfFile && !empty($fileUrl)): ?>
                                        <a href="#" data-doc-viewer="<?= $fileUrl ?>" data-doc-title="<?= esc($doc['title']) ?>" class="btn btn-outline-danger btn-sm rounded-pill flex-grow-1">
                                            <i class="bi bi-file-earmark-pdf me-1"></i> Xem File PDF
                                        </a>
                                    <?php elseif (!empty($imageUrl)): ?>
                                        <a href="<?= $imageUrl ?>" data-fancybox="all-docs" data-caption="<?= esc($doc['title']) ?>" class="btn btn-outline-primary btn-sm rounded-pill flex-grow-1">
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
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted py-5"><?= esc(lang('Site.no_matching_documents')) ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
