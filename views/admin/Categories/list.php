<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container">
     <!-- <?php if($message != ''): ?>
          <div class="alert alert-success">
               <?= $message ?>
          </div>
     <?php endif ?> -->
     <table class="table">
          <thead>
               <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col">
                         <a href="<?= ADMIN_URL . '?ctl=adddm' ?>" class="btn-btn-primary">Thêm mới</a>
                    </th>
               </tr>
          </thead>
          <tbody>
               <?php 
               foreach ($categories as $cate) :
               ?>
                    <tr>
                         <td scope="row"><?= $cate['id'] ?></td>
                         <td><?= $cate['CategoryName'] ?></td>
                         <td>
                              <a href="<?= ADMIN_URL . '?ctl=editdm&id=' . $cate['id'] ?>" class="btn-btn-primary">Sửa</a>
                              <a href="<?= ADMIN_URL .  '?ctl=deletem&id=' . $cate['id'] ?>" class="btn-btn-danger" onclick="return confirm ('Bạn cóa chắc muốn xóa không?')">Xóa</a>
                         </td>
                    </tr>
               <?php endforeach ?>
          </tbody>
     </table>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>