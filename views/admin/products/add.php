<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div>
    <form action="<?= ADMIN_URL . '?ctl=storesp' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
             <input type="text" name="ProductsName" id="" class="form-control">   
        </div>
        <div class="mb-3">
            <label for="">Danh mục</label>
            <select name="CategoryID" id="" class="form-control">
                <?php foreach($danhmucsanpham as $cate): ?>
                    <option value="<?= $cate['CategoryID'] ?>">
                        <?= $cate['CategoryName'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Giá</label>
             <input type="text" name="Price" id="" class="form-control">   
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
            <input type="number" name="Demensions" id="" class="form-control">
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