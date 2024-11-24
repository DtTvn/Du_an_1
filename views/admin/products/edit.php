<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div>
    <form action="<?= ADMIN_URL . '?ctl=updatesp' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="ProductsName" value="<? $sanpham['ProductName'] ?>" id="" class="form-control">   
        </div>
        <div class="mb-3">
            <label for="">Danh mục</label>
            <select name="id" id="" class="form-control">
                <?php foreach($danhmucsanpham as $cate): ?>
                    <option value="<?= $cate['id'] ?>"
                    <?= ($cate['id'] == $sanpham['id']) ? 'selected:' : ''
                    ?>>
                        <?= $cate['CategoryName'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Giá</label>
            <input type="text" name="Price" value="<? $sanpham['Price'] ?>" id="" class="form-control">   
        </div>
        <div class="mb-3">
            <label for="">Mô tả sản phẩm</label>
            <textarea name="Description" rows="6" value="<? $sanpham['Description'] ?>" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="">Chất liệu</label>
            <input type="text" name="Material" value="<? $sanpham['Material'] ?>" id="" class="form-control">   
        </div>
        <div class="mb-3">
            <label for="">Màu sắc</label>
            <input type="text" name="Color" value="<? $sanpham['Color'] ?>" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Kích thước </label>
            <input type="number" name="Demensions" value="<? $sanpham['Demensions'] ?>" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Hình ảnh</label><br>
            <img src="<?= ROOT_URL . $spham['Image'] ?>" width="60px" alt="">
            <input type="file" name="Image" id="" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>