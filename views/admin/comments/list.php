<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="page-content p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách bình luận</h2>
            <!-- Bạn có thể thêm nút Thêm bình luận ở đây nếu cần -->
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle" style="width: 100%; table-layout: fixed; text-align: center;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Hoạt động</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment) : ?>
                        <tr>
                            <td><?= $comment['id'] ?></td>
                            <td><?= $comment['FullName'] ?></td>
                            <td><?= $comment['Content'] ?></td>
                            <td><?= $comment['active'] ? 'Hiện' : 'Ẩn' ?></td>
                            <td class="text-center">
                                <a href="<?= ADMIN_URL . '?ctl=active-comment&id=' . $comment['id'] . '&value=' . $comment['active'] ?>"
                                    class="btn btn-primary btn-sm" style="width: 100px;">
                                    <?= $comment['active'] ? 'Hiện' : 'Ẩn' ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
