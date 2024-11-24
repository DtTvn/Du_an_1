<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<!-- <?php print_r($Categories) ?> -->

<div>
    <form action="<?= ADMIN_URL . '?ctl=storesp' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="" class="form-label">Tên sản phẩm</label>
            <input type="text" name="ProductName" id="" class="form-control">   
        </div>
        <div class="mb-3">
            <label for="">Danh mục</label>
            <select name="id" id="" class="form-control">
                <?php foreach($Categories as $cate): ?>
                    <option value="<?= $cate['id'] ?>">
                        <?= $cate['CategoryName'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Giá</label>
            <input type="text" name="Price" id="" class="form-control" step="0.1">   
        </div>
        <div class="mb-3">
            <label for="">Mô tả sản phẩm</label>
            <textarea name="Description" rows="6" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="">Chất liệu</label>
            <input type="text" name="Material" id="" class="form-control">   
        </div>
        <div class="mb-3">
            <label for="">Màu sắc</label>
            <input type="text" name="Color" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Kích thước </label>
            <input type="number" name="Dimensions" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Hình ảnh</label>
            <input type="file" name="Image" id="" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>