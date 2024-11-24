
<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container">
     <?php if($message != ''): ?>
          <div class="alert alert-success">
               <?php $message ?>
          </div>

     <?php endif ?>
     <table class="table">
          <thead>
               <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col">
                         <a href="<?= '?ctl=adddm'?>" class="btn-btn-primary">Thêm mới</a>
                    </th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($Categories as $Cate) :
               ?>
               <tr>
                    <th scope="row"><?= $Cate['CategoryID'] ?></th>
                    <td><?= $Cate['CategoryName'] ?></td>
                    <td>
                         <a href="<?= '?ctl=editdm&id = '.$Cate['CategoryID'] ?>" class="btn-btn-primary">Sửa</a>
                         <a href="<?= '?ctl=editdm&id = '.$Cate['CategoryID'] ?>" class="btn-btn-danger" onclick="return confirm ('Bạn cóa chắc muốn xóa không?')">Xóa</a>
                    </td>
                    
               </tr>
               <?php endforeach ?>
          </tbody>
     </table>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>