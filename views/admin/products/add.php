<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="page-content p-4">
    <h2 class="mb-4">Thêm Sản Phẩm Mới</h2>
    <div class="card shadow">
        <div class="card-body">
            <form action="<?= ADMIN_URL . '?ctl=storesp' ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <!-- Tên sản phẩm -->
                    <div class="col-md-6 mb-3">
                        <label for="ProductName" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="ProductName" id="ProductName" class="form-control form-control-lg" placeholder="Nhập tên sản phẩm" required>
                    </div>

                    <!-- Giá -->
                    <div class="col-md-6 mb-3">
                        <label for="Price" class="form-label">Giá (VNĐ)</label>
                        <input type="number" name="Price" id="Price" class="form-control form-control-lg" placeholder="Nhập giá sản phẩm" min="0" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Danh mục -->
                    <div class="col-md-6 mb-3">
                        <label for="CategoryID" class="form-label">Danh mục</label>
                        <select name="CategoryID" id="CategoryID" class="form-select form-select-lg" required>
                            <option value="" selected disabled>-- Chọn danh mục --</option>
                            <?php foreach ($Categories as $cate): ?>
                                <option value="<?= $cate['id'] ?>">
                                    <?= $cate['CategoryName'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <!-- Chất liệu -->
                    <div class="col-md-6 mb-3">
                        <label for="Material" class="form-label">Chất liệu</label>
                        <input type="text" name="Material" id="Material" class="form-control form-control-lg" placeholder="Nhập chất liệu sản phẩm">
                    </div>
                </div>

                <div class="row">
                    <!-- Màu sắc -->
                    <div class="col-md-6 mb-3">
                        <label for="Color" class="form-label">Màu sắc</label>
                        <input type="text" name="Color" id="Color" class="form-control form-control-lg" placeholder="Nhập màu sắc sản phẩm">
                    </div>

                    <!-- Kích thước -->
                    <div class="col-md-6 mb-3">
                        <label for="Dimensions" class="form-label">Kích thước (cm)</label>
                        <input type="text" name="Dimensions" id="Dimensions" class="form-control form-control-lg" placeholder="Nhập kích thước sản phẩm">
                    </div>
                </div>

                <!-- Mô tả -->
                <div class="mb-4">
                    <label for="Description" class="form-label">Mô tả sản phẩm</label>
                    <textarea name="Description" id="Description" rows="6" class="form-control form-control-lg" placeholder="Nhập mô tả sản phẩm" required></textarea>
                </div>

                <!-- Hình ảnh -->
                <div class="mb-4">
                    <label for="Image" class="form-label">Hình ảnh</label>
                    <input type="file" name="Image" id="Image" class="form-control form-control-lg" required>
                </div>

                <!-- Nút thêm mới -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success btn-lg px-5">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
