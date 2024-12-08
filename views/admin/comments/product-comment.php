<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="page-content p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách sản phẩm và bình luận</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered align-middle" style="width: 100%; table-layout: fixed; text-align: center;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng bình luận</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $pro) : ?>
                        <tr>
                            <td><?= $pro['id'] ?></td>
                            <td><?= $pro['ProductName'] ?></td>
                            <td><?= $pro['count'] ?></td>
                            <td class="text-center">
                                <a href="<?= ADMIN_URL . '?ctl=comment-detail&id=' . $pro['id'] ?>" class="btn btn-primary btn-sm" style="width: 100px;">
                                    Chi tiết
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
