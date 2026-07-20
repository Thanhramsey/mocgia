<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 fw-bold"><i class="bi bi-box-seam me-2 text-primary"></i><?= esc($title) ?></h4>
        <p class="text-muted mb-0 small">Tổng số: <strong><?= count($products) ?></strong> sản phẩm</p>
    </div>
    <a href="<?= base_url('admin/products/create') ?>" class="btn btn-primary btn-custom rounded-pill">
        <i class="bi bi-plus-circle me-1"></i> Thêm sản phẩm
    </a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
        <i class="bi bi-check-circle me-2"></i><?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<!-- Filter Bar -->
<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body py-3 px-4">
        <form method="get" class="d-flex gap-3 align-items-center flex-wrap">
            <label class="fw-semibold text-muted small mb-0">Lọc nhóm:</label>
            <select name="category_id" class="form-select form-select-sm rounded-pill" style="max-width:240px;" onchange="this.form.submit()">
                <option value="0">— Tất cả nhóm —</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $selectedCategoryId == $cat['id'] ? 'selected' : '' ?>>
                        <?= esc($cat['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if ($selectedCategoryId > 0): ?>
                <a href="<?= base_url('admin/products') ?>" class="btn btn-outline-secondary btn-sm rounded-pill">
                    <i class="bi bi-x me-1"></i>Xóa bộ lọc
                </a>
            <?php endif; ?>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width:44px;">Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Nhóm</th>
                        <th>SKU</th>
                        <th>Giá / Nhãn</th>
                        <th class="text-center">Nổi bật</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($products)): ?>
                        <?php foreach ($products as $p): ?>
                            <tr>
                                <td class="ps-4">
                                    <?php if (! empty($p['cover_image'])): ?>
                                        <img src="<?= base_url($p['cover_image']) ?>" alt="<?= esc($p['title']) ?>"
                                             style="width:44px;height:44px;object-fit:cover;border-radius:6px;">
                                    <?php else: ?>
                                        <div class="bg-light text-muted rounded d-flex align-items-center justify-content-center" style="width:44px;height:44px;">
                                            <i class="bi bi-image fs-5"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="fw-semibold"><?= esc($p['title']) ?></span>
                                    <?php if (! empty($p['summary'])): ?>
                                        <br><small class="text-muted"><?= esc(mb_strimwidth($p['summary'], 0, 70, '…')) ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (! empty($p['category_title'])): ?>
                                        <span class="badge bg-info-subtle text-info border border-info rounded-pill px-2"><?= esc($p['category_title']) ?></span>
                                    <?php else: ?>
                                        <span class="text-muted small">—</span>
                                    <?php endif; ?>
                                </td>
                                <td><code class="small"><?= $p['sku'] ? esc($p['sku']) : '—' ?></code></td>
                                <td>
                                    <?php if (! empty($p['price_label'])): ?>
                                        <span class="fw-semibold text-primary"><?= esc($p['price_label']) ?></span>
                                    <?php elseif (! empty($p['price'])): ?>
                                        <span class="fw-semibold text-primary"><?= number_format((float)$p['price'], 0, ',', '.') ?>đ</span>
                                    <?php else: ?>
                                        <span class="text-muted small">Liên hệ</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['is_featured']): ?>
                                        <i class="bi bi-star-fill text-warning fs-5"></i>
                                    <?php else: ?>
                                        <i class="bi bi-star text-muted"></i>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['status'] == 1): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3">Hiển thị</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary rounded-pill px-3">Ẩn</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('san-pham/' . $p['slug']) ?>" target="_blank" class="btn btn-outline-secondary btn-sm rounded-pill px-2 me-1" title="Xem trên web">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="<?= base_url('admin/products/edit/' . $p['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">
                                        <i class="bi bi-pencil"></i> Sửa
                                    </a>
                                    <a href="<?= base_url('admin/products/delete/' . $p['id']) ?>"
                                       onclick="return confirm('Xóa sản phẩm này?')"
                                       class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                        <i class="bi bi-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>
                                Chưa có sản phẩm nào. <a href="<?= base_url('admin/products/create') ?>">Thêm ngay</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
