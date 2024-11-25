<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container">
     <?php if ($message != ''): ?>
          <div class="alert alert-success">
               <?= $message ?>
          </div>

          <-- id danh mục -->
          <input type="hidden" name="CategoryName" value="<?= $Category['CategoryID'] ?> ">;
          <div class="mb-3">
               <button type="submit" class="btn btn-primary" >Thêm mới</button>
          </div>
     </form>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>