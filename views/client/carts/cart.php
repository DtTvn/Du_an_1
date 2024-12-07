<?php include_once ROOT_DIR . "views/client/header.php" ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Giỏ hàng của bạn</h1>
    <form action="<?= ROOT_URL . '?ctl=update-cart' ?>" method="POST">
        <div class="table-responsive shadow-sm p-3 mb-5 bg-body-tertiary rounded">
            <table class="table table-hover align-middle">
                <thead class="table-dark text-white">
                    <tr>
                        <th scope="col" class="text-center">Mã SP</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col" class="text-center">Giá</th>
                        <th scope="col" class="text-center">Số lượng</th>
                        <th scope="col" class="text-center">Thành tiền</th>
                        <th scope="col" class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carts as $id => $cart) : ?>
                        <tr>
                            <td class="text-center fw-bold"><?= $id ?></td>
                            <td class="text-center">
                                <img src="<?= $cart['Image'] ?>" alt="<?= $cart['ProductName'] ?>" class="rounded shadow-sm"
                                    style="width: 80px; height: auto;">
                            </td>
                            <td class="fw-semibold"><?= $cart['ProductName'] ?></td>
                            <td class="text-center text-primary"><?= number_format($cart['Price']) ?> VNĐ</td>
                            <td class="text-center">
                                <input type="number" name="quantity[<?= $id ?>]" class="form-control mx-auto" value="<?= $cart['quantity'] ?>" min="1"
                                    style="width: 80px;">
                            </td>
                            <td class="text-center text-success fw-bold"><?= number_format($cart['Price'] * $cart['quantity']) ?> VNĐ</td>
                            <td class="text-center">
                                <a href="<?= ROOT_URL . '?ctl=delete-cart&id=' . $id ?>" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <td colspan="5" class="text-end fw-bold fs-5">Tổng tiền:</td>
                        <td colspan="2" class="text-center fw-bold fs-5 text-danger"><?= number_format($totalPriceInOrder) ?> VNĐ</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- Nút hành động -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                <a href="<?= ROOT_URL ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
                </a>
                <a href="<?= ROOT_URL . '?ctl=list-order' ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-clock-history"></i> Lịch sử đơn hàng
                </a>
            </div>
            <div>
                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-arrow-clockwise"></i> Cập nhật giỏ hàng
                </button>
                <a href="<?= ROOT_URL . '?ctl=view-checkout' ?>" class="btn btn-success">
                    <i class="bi bi-credit-card"></i> Thanh toán
                </a>
            </div>
        </div>
    </form>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>
