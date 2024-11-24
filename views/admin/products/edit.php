<?php include_once ROOT_DIR . "views/admin/header.php"; ?>

<div>
    <form action="<?= ADMIN_URL . '?ctl=storesp' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ProductName" class="form-label">Tên sản phẩm</label>
            <input type="text" name="ProductName" id="ProductName" class="form-control" 
                   value="<?= isset($products['ProductName']) ? htmlspecialchars($products['ProductName']) : '' ?>">   
        </div>
        <div class="mb-3">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                <?php if (!empty($Categories)): ?>
                    <?php foreach ($Categories as $cate): ?>
                        <option value="<?= htmlspecialchars($cate['id']) ?>"
                            <?= isset($products['category_id']) && $cate['id'] == $products['category_id'] ? 'selected' : '' ?>>
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
                   value="<?= isset($products['Price']) ? htmlspecialchars($products['Price']) : '' ?>">   
        </div>
        <div class="mb-3">
            <label for="Description">Mô tả sản phẩm</label>
            <textarea name="Description" id="Description" rows="6" class="form-control"><?= isset($products['Description']) ? htmlspecialchars($products['Description']) : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="Material">Chất liệu</label>
            <input type="text" name="Material" id="Material" class="form-control" 
                   value="<?= isset($products['Material']) ? htmlspecialchars($products['Material']) : '' ?>">   
        </div>
        <div class="mb-3">
            <label for="Color">Màu sắc</label>
            <input type="text" name="Color" id="Color" class="form-control" 
                   value="<?= isset($products['Color']) ? htmlspecialchars($products['Color']) : '' ?>">
        </div>
        <div class="mb-3">
            <label for="Dimensions">Kích thước</label>
            <input type="number" name="Dimensions" id="Dimensions" class="form-control" 
                   value="<?= isset($products['Dimensions']) ? htmlspecialchars($products['Dimensions']) : '' ?>">
        </div>
        <div class="mb-3">
            <label for="Image">Hình ảnh</label>
            <?php if (!empty($products['Image']) && file_exists(ROOT_DIR . $products['Image'])): ?>
                <img src="<?= ROOT_DIR . htmlspecialchars($products['Image']) ?>" alt="Sản phẩm" style="max-width: 150px;">
            <?php endif; ?>
            <input type="file" name="Image" id="Image" class="form-control">
            <input type="hidden" name="OldImage" value="<?= isset($products['Image']) ? htmlspecialchars($products['Image']) : '' ?>">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php"; ?>
