<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container">
    <h2>Dang ky</h2>
    <form action="<?= ADMIN_URL . '?ctl=updateuser' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="" class="form-label">Ho ten</label>
            <input class="user" type="text" name="FullName" value="<?= $user['FullName'] ?>">
        </div>
        <div class="mb-3">
            <label for="">Điện thoại</label>
        </div>
        <div class="mb-3">
            <label for="">Mô tả sản phẩm</label>
        </div>
        <div class="btn btn-primary w-100">
                    <button type="submit">Đăng ký</button> 
        </div>
    </form>
</div>


<?php include_once ROOT_DIR . "views/admin/footer.php" ?>