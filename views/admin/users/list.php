<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh sách người dùng</h2>
        <!-- Thêm nút thêm người dùng nếu cần -->
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Quyền</th>
                    <th scope="col">Hoạt động</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user['id'] ?></th>
                        <td><?= $user['FullName'] ?></td>
                        <td><?= $user['Email'] ?></td>
                        <td><?= $user['Phone'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td>
                            <?php if ($user['active'] == 1) : ?>
                                <span class="badge bg-success">
                                    Hoạt động
                                </span>
                            <?php else : ?>
                                <span class="badge bg-danger">
                                    Khóa
                                </span>
                            <?php endif ?>
                        </td>
                        <td><?= $user['address'] ?></td>
                        <td>
                            <form action="<?= ADMIN_URL . '?ctl=updateuser' ?>" method="post">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <input type="hidden" name="active" value="<?= $user['active']?>">
                                <?php if ($user['role'] != 'admin') : ?>
                                    <?php if ($user['active'] == 1) : ?>
                                        <button type="submit" class="btn btn-danger">Khóa</button>
                                    <?php else : ?>
                                        <button type="submit" class="btn btn-primary">Kích hoạt</button>
                                    <?php endif ?>
                                <?php endif ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
