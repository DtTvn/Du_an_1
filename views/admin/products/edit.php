<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<div class="page-content p-4">
    <h2 class="mb-4">Chỉnh Sửa Sản Phẩm</h2>
    <div class="card shadow">
        <div class="card-body">
            <form action="<?= ADMIN_URL . '?ctl=updatesp' ?>" method="post" enctype="multipart/form-data">
                <!-- Tên sản phẩm -->
                <div class="mb-3">
                    <label for="ProductName" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="ProductName" id="ProductName" class="form-control form-control-lg"
                        value="<?= htmlspecialchars($products['ProductName']) ?>" required>
                </div>

                <!-- Danh mục -->
                <div class="mb-3">
                    <label for="CategoryID" class="form-label">Danh mục</label>
                    <select name="CategoryID" id="CategoryID" class="form-select form-select-lg" required>
                        <?php if (!empty($Categories)): ?>
                            <?php foreach ($Categories as $cate): ?>
                                <option value="<?= htmlspecialchars($cate['id']) ?>"
                                    <?= isset($products['CategoryID']) && $cate['id'] == $products['CategoryID'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cate['CategoryName']) ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Không có danh mục</option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- Giá -->
                <div class="mb-3">
                    <label for="Price" class="form-label">Giá (VNĐ)</label>
                    <input type="number" name="Price" id="Price" class="form-control form-control-lg" step="0.01"
                        value="<?= htmlspecialchars($products['Price']) ?>" min="0" required>
                </div>

                <!-- Mô tả sản phẩm -->
                <div class="mb-3">
                    <label for="Description" class="form-label">Mô tả sản phẩm</label>
                    <textarea name="Description" id="Description" rows="6" class="form-control form-control-lg" required><?= htmlspecialchars($products['Description']) ?></textarea>
                </div>

                <div class="row">
                    <!-- Chất liệu -->
                    <div class="col-md-6 mb-3">
                        <label for="Material" class="form-label">Chất liệu</label>
                        <input type="text" name="Material" id="Material" class="form-control form-control-lg"
                            value="<?= htmlspecialchars($products['Material']) ?>">
                    </div>

                    <!-- Màu sắc -->
                    <div class="col-md-6 mb-3">
                        <label for="Color" class="form-label">Màu sắc</label>
                        <input type="text" name="Color" id="Color" class="form-control form-control-lg"
                            value="<?= htmlspecialchars($products['Color']) ?>">
                    </div>
                </div>

                <div class="row">
                    <!-- Kích thước -->
                    <div class="col-md-6 mb-3">
                        <label for="Dimensions" class="form-label">Kích thước (cm)</label>
                        <input type="text" name="Dimensions" id="Dimensions" class="form-control form-control-lg"
                            value="<?= htmlspecialchars($products['Dimensions']) ?>">
                    </div>

                    <!-- Hình ảnh -->
                    <div class="col-md-6 mb-3">
                        <label for="Image" class="form-label">Hình ảnh</label>
                        <div class="d-flex align-items-center">
                            <input type="hidden" name="Image" value="<?= htmlspecialchars($products['Image']) ?>">
                            <input type="file" name="Image" id="Image" class="form-control">
                        </div>
                    </div>
                </div>


                <!-- Hiển thị ảnh hiện tại -->
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh hiện tại</label>
                    <div>
                        <?php
                        // Kiểm tra đường dẫn ảnh có đúng không
                        if (!empty($products['Image']) && file_exists(ROOT_DIR . $products['Image'])): ?>
                            <img src="<?= ROOT_URL . $products['Image'] ?>" alt="Product Image" width="150">
                        <?php else: ?>
                            <p>Không có ảnh hiện tại hoặc ảnh không tồn tại.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ID sản phẩm (ẩn) -->
                <input type="hidden" name="id" value="<?= htmlspecialchars($products['id']) ?>">

                <!-- Nút cập nhật -->
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>