<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container">
     <form action="<?= '?ctl=storedm' ?>" method="post">
          <div class="mb-3">
               <label for="" class="form-label">Tên Danh Mục</label>
               <input type="text" name="CategoryName" class="form-control" id="">
          </div>
          <div class="mb-3">
               <button type="submit" class="btn btn-primary">Thêm mới</button>
          </div>
     </form>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>