<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2 text-primary"></i><?= esc($title) ?></h4>
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

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
        <i class="bi bi-check-circle me-2"></i><?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<form action="<?= base_url('admin/products/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row g-4">

        <!-- LEFT COLUMN -->
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-box-seam me-2 text-primary"></i>Thông tin sản phẩm</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control rounded-3" value="<?= esc(old('title', $product['title'])) ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Mã sản phẩm (SKU)</label>
                            <input type="text" name="sku" class="form-control rounded-3" value="<?= esc(old('sku', $product['sku'])) ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Giá</label>
                            <input type="number" name="price" class="form-control rounded-3" value="<?= old('price', $product['price']) ?>" min="0">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Nhãn giá hiển thị</label>
                            <input type="text" name="price_label" class="form-control rounded-3" value="<?= esc(old('price_label', $product['price_label'])) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Mô tả ngắn</label>
                            <textarea name="summary" class="form-control rounded-3" rows="3"><?= esc(old('summary', $product['summary'])) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-file-richtext me-2 text-primary"></i>Mô tả chi tiết</h6>
                </div>
                <div class="card-body p-4">
                    <textarea name="content" id="content" class="form-control" rows="12"><?= old('content', $product['content']) ?></textarea>
                </div>
            </div>

            <!-- Specs -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-list-check me-2 text-primary"></i>Thông số kỹ thuật</h6>
                    <button type="button" id="add-spec-btn" class="btn btn-outline-primary btn-sm rounded-pill"><i class="bi bi-plus me-1"></i>Thêm</button>
                </div>
                <div class="card-body p-4">
                    <div id="specs-container">
                        <?php if (! empty($specs)): ?>
                            <?php foreach ($specs as $spec): ?>
                            <div class="row g-2 spec-row mb-2">
                                <div class="col-5">
                                    <input type="text" name="spec_keys[]" class="form-control rounded-3 form-control-sm" value="<?= esc($spec['key']) ?>">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="spec_values[]" class="form-control rounded-3 form-control-sm" value="<?= esc($spec['value']) ?>">
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm rounded-circle remove-spec-btn"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="row g-2 spec-row mb-2">
                                <div class="col-5"><input type="text" name="spec_keys[]" class="form-control rounded-3 form-control-sm" placeholder="Tên thông số"></div>
                                <div class="col-6"><input type="text" name="spec_values[]" class="form-control rounded-3 form-control-sm" placeholder="Giá trị"></div>
                                <div class="col-1 d-flex align-items-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-circle remove-spec-btn"><i class="bi bi-x"></i></button></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Current Media Gallery -->
            <?php if (! empty($media)): ?>
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-collection me-2 text-primary"></i>Media hiện tại</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3" id="current-media-grid">
                        <?php foreach ($media as $item): ?>
                            <div class="col-sm-4 col-md-3 media-item" id="media-item-<?= $item['id'] ?>">
                                <div class="position-relative rounded-3 overflow-hidden border" style="height:100px;">
                                    <?php if ($item['type'] === 'image'): ?>
                                        <img src="<?= base_url($item['file_path']) ?>" alt="<?= esc($item['caption']) ?>"
                                             style="width:100%;height:100%;object-fit:cover;">
                                    <?php else: ?>
                                        <div class="d-flex align-items-center justify-content-center h-100 bg-dark text-white">
                                            <i class="bi bi-play-circle fs-2"></i>
                                        </div>
                                    <?php endif; ?>
                                    <button type="button"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle p-0 delete-media-btn"
                                            style="width:24px;height:24px;line-height:1;"
                                            data-id="<?= $item['id'] ?>"
                                            data-url="<?= base_url('admin/products/delete-media/' . $item['id']) ?>"
                                            title="Xóa">
                                        <i class="bi bi-x" style="font-size:0.8rem;"></i>
                                    </button>
                                </div>
                                <?php if ($item['type'] === 'video'): ?>
                                    <small class="text-muted d-block mt-1 text-truncate"><?= esc($item['video_url']) ?></small>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Upload new gallery images -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-images me-2 text-primary"></i>Thêm ảnh vào Gallery</h6>
                </div>
                <div class="card-body p-4">
                    <input type="file" name="gallery_images[]" class="form-control rounded-3" accept="image/*" multiple>
                    <small class="text-muted">Chọn nhiều ảnh — jpg, png, webp. Tối đa 20MB mỗi ảnh.</small>
                </div>
            </div>

            <!-- New videos -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-play-btn me-2 text-primary"></i>Thêm video mới</h6>
                    <button type="button" id="add-video-btn" class="btn btn-outline-primary btn-sm rounded-pill"><i class="bi bi-plus me-1"></i>Thêm</button>
                </div>
                <div class="card-body p-4">
                    <div id="videos-container">
                        <div class="row g-2 video-row mb-2">
                            <div class="col-7"><input type="text" name="video_urls[]" class="form-control rounded-3 form-control-sm" placeholder="URL YouTube / Vimeo"></div>
                            <div class="col-4"><input type="text" name="video_captions[]" class="form-control rounded-3 form-control-sm" placeholder="Tiêu đề (tùy chọn)"></div>
                            <div class="col-1 d-flex align-items-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-circle remove-video-btn"><i class="bi bi-x"></i></button></div>
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
                            <input type="text" name="seo_title" class="form-control rounded-3" value="<?= esc(old('seo_title', $product['seo_title'])) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">SEO Keywords</label>
                            <input type="text" name="seo_keywords" class="form-control rounded-3" value="<?= esc(old('seo_keywords', $product['seo_keywords'])) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">SEO Description</label>
                            <textarea name="seo_description" class="form-control rounded-3" rows="2"><?= esc(old('seo_description', $product['seo_description'])) ?></textarea>
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
                                <option value="<?= $cat['id'] ?>" <?= old('category_id', $product['category_id']) == $cat['id'] ? 'selected' : '' ?>>
                                    <?= esc($cat['title']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Trạng thái <span class="text-danger">*</span></label>
                        <select name="status" class="form-select rounded-3" required>
                            <option value="1" <?= old('status', $product['status']) == '1' ? 'selected' : '' ?>>Hiển thị</option>
                            <option value="0" <?= old('status', $product['status']) == '0' ? 'selected' : '' ?>>Ẩn</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thứ tự</label>
                        <input type="number" name="sort_order" class="form-control rounded-3" value="<?= old('sort_order', $product['sort_order']) ?>" min="0">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                   <?= old('is_featured', $product['is_featured']) ? 'checked' : '' ?>>
                            <label class="form-check-label fw-semibold" for="is_featured">Sản phẩm nổi bật <i class="bi bi-star-fill text-warning"></i></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-image me-2 text-primary"></i>Ảnh đại diện</h6>
                </div>
                <div class="card-body p-4">
                    <?php if (! empty($product['cover_image'])): ?>
                        <img src="<?= base_url($product['cover_image']) ?>" alt="cover" class="img-fluid rounded-3 mb-3" style="max-height:180px;width:100%;object-fit:cover;">
                    <?php endif; ?>
                    <div id="cover-preview" class="mb-2 d-none">
                        <img id="cover-img-preview" src="" alt="Preview" class="img-fluid rounded-3" style="max-height:180px;width:100%;object-fit:cover;">
                    </div>
                    <input type="file" name="cover_image" id="cover_image" class="form-control rounded-3" accept="image/*">
                    <small class="text-muted">Để trống để giữ ảnh hiện tại.</small>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-custom rounded-pill px-5 w-100">
                    <i class="bi bi-check-circle me-1"></i> Cập nhật sản phẩm
                </button>
            </div>
        </div>
    </div>
</form>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit@4.2.27/es2021/jodit.min.css">
<script src="https://cdn.jsdelivr.net/npm/jodit@4.2.27/es2021/jodit.min.js"></script>
<script>
const CSRF_NAME  = '<?= csrf_token() ?>';
let   CSRF_TOKEN = '<?= csrf_hash() ?>';

document.addEventListener('DOMContentLoaded', function () {
    Jodit.make('#content', {
        height: 400,
        toolbarAdaptive: false,
        buttons: 'bold,italic,underline,|,ul,ol,|,image,link,table,|,align,undo,redo,|,fullsize',
    });

    document.getElementById('cover_image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = ev => {
            document.getElementById('cover-img-preview').src = ev.target.result;
            document.getElementById('cover-preview').classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    });

    // Spec rows
    document.getElementById('add-spec-btn').addEventListener('click', () => {
        const c = document.getElementById('specs-container');
        const r = c.querySelector('.spec-row').cloneNode(true);
        r.querySelectorAll('input').forEach(i => i.value = '');
        c.appendChild(r);
    });
    document.getElementById('specs-container').addEventListener('click', e => {
        if (e.target.closest('.remove-spec-btn')) {
            if (document.querySelectorAll('.spec-row').length > 1) e.target.closest('.spec-row').remove();
        }
    });

    // Video rows
    document.getElementById('add-video-btn').addEventListener('click', () => {
        const c = document.getElementById('videos-container');
        const r = c.querySelector('.video-row').cloneNode(true);
        r.querySelectorAll('input').forEach(i => i.value = '');
        c.appendChild(r);
    });
    document.getElementById('videos-container').addEventListener('click', e => {
        if (e.target.closest('.remove-video-btn')) {
            if (document.querySelectorAll('.video-row').length > 1) e.target.closest('.video-row').remove();
        }
    });

    // Delete media via AJAX
    document.querySelectorAll('.delete-media-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            if (!confirm('Xóa media này?')) return;
            const id  = this.dataset.id;
            const url = this.dataset.url;
            fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                body: JSON.stringify({ [CSRF_NAME]: CSRF_TOKEN })
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('media-item-' + id)?.remove();
                } else {
                    alert(data.message || 'Xóa thất bại.');
                }
            });
        });
    });
});
</script>

<?= $this->endSection() ?>
