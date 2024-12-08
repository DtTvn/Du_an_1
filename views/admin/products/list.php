<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="page-content p-4">
    <?php if ($message) : ?>
        <div class="alert alert-<?= $type ?? 'success' ?> alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách sản phẩm</h2>
            <a href="<?= "?ctl=addsp" ?>" class="btn btn-success btn-lg">+ Thêm sản phẩm</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ProductID</th>
                        <th scope="col">ProductName</th>
                        <th scope="col">Price</th>
                        <th scope="col">Material</th>
                        <th scope="col">Color</th>
                        <th scope="col">Dimensions</th>
                        <th scope="col">CategoryName</th>
                        <th scope="col">Image</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $pro) : ?>
                        <tr>
                            <td><?= $pro['id'] ?></td>
                            <td><?= $pro['ProductName'] ?></td>
                            <td><?= number_format($pro['Price'], 0, ',', '.') ?> đ</td>
                            <td><?= $pro['Material'] ?></td>
                            <td><?= $pro['Color'] ?></td>
                            <td><?= $pro['Dimensions'] ?></td>
                            <td><?= $pro['CategoryName'] ?></td>
                            <td>
                                <img src="<?= ROOT_URL . $pro['Image'] ?>" width="60px" height="60px" class="img-thumbnail" alt="Product Image">
                            </td>
                            <td class="text-center">
                                <a href="<?= '?ctl=editsp&id=' . $pro['id'] ?>" class="btn btn-primary btn-sm me-1">Edit</a>
                                <a href="<?= ADMIN_URL . '?ctl=deletesp&id=' . $pro['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
