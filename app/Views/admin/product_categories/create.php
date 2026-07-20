<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i><?= esc($title) ?></h4>
    </div>
    <a href="<?= base_url('admin/product-categories') ?>" class="btn btn-outline-secondary rounded-pill btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Quay lại
    </a>
</div>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
        <ul class="mb-0 small">
            <?php foreach (session()->getFlashdata('errors') as $err): ?>
                <li><?= esc($err) ?></li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<form action="<?= base_url('admin/product-categories/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="row g-4">
        <!-- Main Info -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2 text-primary"></i>Thông tin nhóm sản phẩm</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Tên nhóm sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control rounded-3" value="<?= old('title') ?>" placeholder="Ví dụ: Ván MDF phủ Melamine" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Icon Bootstrap</label>
                            <input type="text" name="icon" class="form-control rounded-3" value="<?= old('icon', 'bi-box-seam') ?>" placeholder="bi-box-seam">
                            <small class="text-muted">Xem danh sách tại <a href="https://icons.getbootstrap.com/" target="_blank">icons.getbootstrap.com</a></small>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Mô tả ngắn</label>
                            <textarea name="description" class="form-control rounded-3" rows="3" placeholder="Mô tả ngắn về nhóm sản phẩm này..."><?= old('description') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="card border-0 shadow-sm rounded-4 mt-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-search me-2 text-primary"></i>Cấu hình SEO</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">SEO Title</label>
                            <input type="text" name="seo_title" class="form-control rounded-3" value="<?= old('seo_title') ?>" placeholder="Để trống sẽ dùng tên nhóm...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">SEO Keywords</label>
                            <input type="text" name="seo_keywords" class="form-control rounded-3" value="<?= old('seo_keywords') ?>" placeholder="Từ khóa, cách nhau bằng dấu phẩy...">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">SEO Meta Description</label>
                            <textarea name="seo_description" class="form-control rounded-3" rows="2" placeholder="Mô tả ngắn cho Google..."><?= old('seo_description') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Options -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-sliders me-2 text-primary"></i>Tùy chọn</h6>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nhóm cha (nếu là danh mục con)</label>
                        <select name="parent_id" class="form-select rounded-3">
                            <option value="">-- Không có (là nhóm gốc) --</option>
                            <?php foreach ($parents as $parent): ?>
                                <option value="<?= $parent['id'] ?>" <?= old('parent_id') == $parent['id'] ? 'selected' : '' ?>>
                                    <?= esc($parent['title']) ?>
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
                        <label class="form-label fw-semibold">Thứ tự hiển thị</label>
                        <input type="number" name="sort_order" class="form-control rounded-3" value="<?= old('sort_order', '0') ?>" min="0">
                        <small class="text-muted">Số nhỏ hơn hiển thị trước.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ảnh đại diện nhóm</label>
                        <input type="file" name="image" class="form-control rounded-3" accept="image/*">
                        <small class="text-muted">jpg, png, webp. Tối đa 5MB.</small>
                    </div>
                </div>
            </div>

            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-primary btn-custom rounded-pill px-5">
                    <i class="bi bi-check-circle me-1"></i> Lưu nhóm sản phẩm
                </button>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
