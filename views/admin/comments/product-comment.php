<?php include_once ROOT_DIR . "views/admin/header.php" ?>
    <div class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng bình luận</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $pro) :
                    ?>
                        <tr>
                            <th scope="row"><?= $pro['id'] ?></th>
                            <td><?= $pro['ProductName'] ?></td>
                            <td><?= $pro['count'] ?></td>
                            <td>
                            <a href="<?= ADMIN_URL . '?ctl=comment-detail&id=' . $pro['id'] ?>" class="btn btn-primary">Chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php include_once ROOT_DIR . "views/admin/footer.php" ?>