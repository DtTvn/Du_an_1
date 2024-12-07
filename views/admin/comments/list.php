<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Hoạt động</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($comments as $comment) :
            ?>
                <tr>
                    <td><?= $comment['id'] ?></td>
                    <td><?= $comment['FullName'] ?></td>
                    <td><?= $comment['Content'] ?></td>
                    <td><?= $comment['active'] ? 'Hiện' : 'Ẩn' ?></td>
                    <td>
                        <a href="<?= ADMIN_URL . '?ctl=active-comment&id=' . $comment['id'] . '&value=' . $comment['active'] ?>"
                         class="btn btn-primary"><?= $comment['active'] ? 'Hiện' : 'Ẩn' ?></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>