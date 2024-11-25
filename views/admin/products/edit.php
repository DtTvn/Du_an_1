<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<div>
    <form action="<?= ADMIN_URL . '?ctl=updatesp' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ProductName" class="form-label">Tên sản phẩm</label>
            <input type="text" name="ProductName" id="ProductName" class="form-control"
                value="<?= $products['ProductName'] ?>">
        </div>
        <div class="mb-3">
            <label for="CategoryID">Danh mục</label>
            <select name="CategoryID" id="CategoryID" class="form-control">
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
        <div class="mb-3">
            <label for="Price">Giá</label>
            <input type="text" name="Price" id="Price" class="form-control" step="0.1"
                value="<?= $products['Price'] ?>">
        </div>
        <div class="mb-3">
            <label for="Description">Mô tả sản phẩm</label>
            <textarea name="Description" id="Description" rows="6" class="form-control"><?= $products['Description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="Material">Chất liệu</label>
            <input type="text" name="Material" id="Material" class="form-control"
                value="<?= $products['Material'] ?>">
        </div>
        <div class="mb-3">
            <label for="Color">Màu sắc</label>
            <input type="text" name="Color" id="Color" class="form-control"
                value="<?= $products['Color'] ?>">
        </div>
        <div class="mb-3">
            <label for="Dimensions">Kích thước</label>
            <input type="number" name="Dimensions" id="Dimensions" class="form-control"
                value="<?= $products['Dimensions'] ?>">
        </div>
        <div class="mb-3">
            <label for="Image">Hình ảnh</label>
                <img src="<?= ROOT_DIR . $products['Image'] ?>" alt="Sản phẩm" style="max-width: 150px;">
                <input type="hidden" name="Image" value="<?= $products['Image'] ?>">
                <input type="file" name="Image" id="Image" class="form-control">
        </div>
        <input type="hidden" name="id" value="<?= $products['id'] ?>">
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>