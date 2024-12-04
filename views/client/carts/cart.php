<?php include_once ROOT_DIR . "views/client/header.php" ?>

<div class="container mt-5">
    <h1 class="mb-4">Giỏ hàng của bạn</h1>
    <form action="<?= ROOT_URL . '?ctl=update-cart' ?>" method="POST">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carts as $id => $cart) : ?>
                        <!-- Dòng sản phẩm 1 -->
                        <tr>
                            <th scope="row"><?= $id ?></th>
                            <td>
                                <img src="<?= $cart['Image'] ?>" alt="<?= $cart['ProductName'] ?>" class="img-thumbnail"
                                    style="width: 80px; height: auto;">
                            </td>
                            <td><?= $cart['ProductName'] ?></td>
                            <td><?= number_format($cart['Price']) ?> VNĐ</td>
                            <td>
                                <input type="number" name="quantity[<?= $id ?>]" class="form-control" value="<?= $cart['quantity'] ?>" min="1"
                                    style="width: 80px;">
                            </td>
                            <td><?= number_format($cart['Price'] * $cart['quantity']) ?> VNĐ</td>
                            <td>
                                <a href="<?= ROOT_URL . '?ctl=delete-cart&id=' . $id ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <!-- Tổng tiền -->
                <tfoot class="table-light">
                    <tr>
                        <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                        <td colspan="2" class="fw-bold text-danger"><?= number_format($totalPriceInOrder) ?> VNĐ</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- Nút hành động -->
        <div class="d-flex justify-content-between mt-4">
            <div>
                <a href="<?= ROOT_URL ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
                </a>
                <a href="<?= ROOT_URL . '?ctl=list-order' ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Lịch sử đơn hàng
                </a>
            </div>
            <div>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-arrow-clockwise"></i> Cập nhật giỏ hàng
                </button>
                <a href="<?= ROOT_URL . '?ctl=view-checkout' ?>" type="button" class="btn btn-success">
                    <i class="bi bi-credit-card"></i> Thanh toán
                </a>
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>