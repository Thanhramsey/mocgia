<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i><?= esc($title) ?></h4>
    <a href="<?= base_url('admin/products') ?>" class="btn btn-outline-secondary rounded-pill btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Quay lại
    </a>
</div>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4">
        <ul class="mb-0 small">
            <?php foreach (session()->getFlashdata('errors') as $err): ?><li><?= esc($err) ?></li><?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<form action="<?= base_url('admin/products/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row g-4">

        <!-- LEFT COLUMN -->
        <div class="col-lg-8">

            <!-- Basic Info -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-box-seam me-2 text-primary"></i>Thông tin sản phẩm</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control rounded-3" value="<?= old('title') ?>" placeholder="Ví dụ: Ván MDF lõi xanh 18mm E0" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Mã sản phẩm (SKU)</label>
                            <input type="text" name="sku" class="form-control rounded-3" value="<?= old('sku') ?>" placeholder="MG-MDF-18">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Giá (số, để trống nếu không có)</label>
                            <input type="number" name="price" class="form-control rounded-3" value="<?= old('price') ?>" placeholder="350000" min="0">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Nhãn giá hiển thị</label>
                            <input type="text" name="price_label" class="form-control rounded-3" value="<?= old('price_label') ?>" placeholder="Ví dụ: 350.000đ/tấm, Liên hệ báo giá...">
                            <small class="text-muted">Nhãn này ưu tiên hiển thị hơn số giá.</small>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Mô tả ngắn</label>
                            <textarea name="summary" class="form-control rounded-3" rows="3" placeholder="Tóm tắt ngắn gọn về sản phẩm (hiển thị trên danh sách)..."><?= old('summary') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content (Rich text) -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-file-richtext me-2 text-primary"></i>Mô tả chi tiết</h6>
                </div>
                <div class="card-body p-4">
                    <textarea name="content" id="content" class="form-control" rows="12"><?= old('content') ?></textarea>
                </div>
            </div>

            <!-- Technical Specifications -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-list-check me-2 text-primary"></i>Thông số kỹ thuật</h6>
                    <button type="button" id="add-spec-btn" class="btn btn-outline-primary btn-sm rounded-pill">
                        <i class="bi bi-plus me-1"></i>Thêm thông số
                    </button>
                </div>
                <div class="card-body p-4">
                    <div id="specs-container">
                        <div class="row g-2 spec-row mb-2">
                            <div class="col-5">
                                <input type="text" name="spec_keys[]" class="form-control rounded-3 form-control-sm" placeholder="Tên thông số (vd: Kích thước)">
                            </div>
                            <div class="col-6">
                                <input type="text" name="spec_values[]" class="form-control rounded-3 form-control-sm" placeholder="Giá trị (vd: 1220x2440mm)">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <button type="button" class="btn btn-outline-danger btn-sm rounded-circle remove-spec-btn" title="Xóa dòng">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Nhập từng cặp Tên – Giá trị thông số kỹ thuật sản phẩm.</small>
                </div>
            </div>

            <!-- Gallery Images -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-images me-2 text-primary"></i>Bộ ảnh sản phẩm (Gallery)</h6>
                </div>
                <div class="card-body p-4">
                    <input type="file" name="gallery_images[]" class="form-control rounded-3" accept="image/*" multiple>
                    <small class="text-muted">Chọn nhiều ảnh bằng cách giữ Ctrl/Shift khi chọn. jpg, png, webp. Mỗi ảnh tối đa 20MB.</small>
                </div>
            </div>

            <!-- Videos -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-play-btn me-2 text-primary"></i>Video sản phẩm</h6>
                    <button type="button" id="add-video-btn" class="btn btn-outline-primary btn-sm rounded-pill">
                        <i class="bi bi-plus me-1"></i>Thêm video
                    </button>
                </div>
                <div class="card-body p-4">
                    <div id="videos-container">
                        <div class="row g-2 video-row mb-2">
                            <div class="col-7">
                                <input type="text" name="video_urls[]" class="form-control rounded-3 form-control-sm" placeholder="URL YouTube / Vimeo">
                            </div>
                            <div class="col-4">
                                <input type="text" name="video_captions[]" class="form-control rounded-3 form-control-sm" placeholder="Tiêu đề video (tùy chọn)">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <button type="button" class="btn btn-outline-danger btn-sm rounded-circle remove-video-btn" title="Xóa">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-search me-2 text-primary"></i>Cấu hình SEO</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">SEO Title</label>
                            <input type="text" name="seo_title" class="form-control rounded-3" value="<?= old('seo_title') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">SEO Keywords</label>
                            <input type="text" name="seo_keywords" class="form-control rounded-3" value="<?= old('seo_keywords') ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">SEO Description</label>
                            <textarea name="seo_description" class="form-control rounded-3" rows="2"><?= old('seo_description') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-sliders me-2 text-primary"></i>Cài đặt xuất bản</h6>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nhóm sản phẩm <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select rounded-3" required>
                            <option value="">-- Chọn nhóm --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= old('category_id') == $cat['id'] ? 'selected' : '' ?>>
                                    <?= esc($cat['title']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Trạng thái <span class="text-danger">*</span></label>
                        <select name="status" class="form-select rounded-3" required>
                            <option value="1" <?= old('status', '1') == '1' ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="0" <?= old('status') == '0' ? 'selected' : '' ?>>Ẩn</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thứ tự</label>
                        <input type="number" name="sort_order" class="form-control rounded-3" value="<?= old('sort_order', '0') ?>" min="0">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" <?= old('is_featured') ? 'checked' : '' ?>>
                            <label class="form-check-label fw-semibold" for="is_featured">Sản phẩm nổi bật <i class="bi bi-star-fill text-warning"></i></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cover image -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-image me-2 text-primary"></i>Ảnh đại diện (Thumbnail)</h6>
                </div>
                <div class="card-body p-4">
                    <div id="cover-preview" class="mb-3 d-none">
                        <img id="cover-img-preview" src="" alt="Preview" class="img-fluid rounded-3" style="max-height:200px;width:100%;object-fit:cover;">
                    </div>
                    <input type="file" name="cover_image" id="cover_image" class="form-control rounded-3" accept="image/*">
                    <small class="text-muted">jpg, png, webp. Tối đa 20MB.</small>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-custom rounded-pill px-5 w-100">
                    <i class="bi bi-check-circle me-1"></i> Lưu sản phẩm
                </button>
            </div>
        </div>
    </div>
</form>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@4.2.27/es2021/jodit.min.css">
<script src="https://cdn.jsdelivr.net/npm/jodit@4.2.27/es2021/jodit.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Jodit rich text editor
    Jodit.make('#content', {
        height: 400,
        toolbarAdaptive: false,
        buttons: 'bold,italic,underline,|,ul,ol,|,image,link,table,|,align,undo,redo,|,fullsize',
    });

    // Cover image preview
    document.getElementById('cover_image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (ev) {
            document.getElementById('cover-img-preview').src = ev.target.result;
            document.getElementById('cover-preview').classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    });

    // Dynamic spec rows
    document.getElementById('add-spec-btn').addEventListener('click', function () {
        const container = document.getElementById('specs-container');
        const row = document.querySelector('.spec-row').cloneNode(true);
        row.querySelectorAll('input').forEach(i => i.value = '');
        container.appendChild(row);
    });

    document.getElementById('specs-container').addEventListener('click', function (e) {
        if (e.target.closest('.remove-spec-btn')) {
            const rows = document.querySelectorAll('.spec-row');
            if (rows.length > 1) e.target.closest('.spec-row').remove();
        }
    });

    // Dynamic video rows
    document.getElementById('add-video-btn').addEventListener('click', function () {
        const container = document.getElementById('videos-container');
        const row = document.querySelector('.video-row').cloneNode(true);
        row.querySelectorAll('input').forEach(i => i.value = '');
        container.appendChild(row);
    });

    document.getElementById('videos-container').addEventListener('click', function (e) {
        if (e.target.closest('.remove-video-btn')) {
            const rows = document.querySelectorAll('.video-row');
            if (rows.length > 1) e.target.closest('.video-row').remove();
        }
    });
});
</script>

<?= $this->endSection() ?>
