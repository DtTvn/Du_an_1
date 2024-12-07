<?php include_once ROOT_DIR . "views/client/header.php" ?>
<link rel="stylesheet" href="css/checkout.css">

<div class="container mt-5">
    <h1 class="mb-4">Thông tin thanh toán</h1>
    <div class="row">
        <!-- Form thông tin thanh toán -->
        <div class="col-md-7">
            <form action="<?= ROOT_URL . '?ctl=checkout' ?>" method="POST">
                <!-- Thông tin người nhận -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5>Thông tin người nhận</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" value="<?= $user['FullName'] ?>" name="FullName"
                                placeholder="Nhập họ tên" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" value="<?= $user['Phone'] ?>" name="Phone"
                                placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?= $user['Email'] ?>" name="Email"
                                placeholder="Nhập email" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ giao hàng</label>
                            <textarea class="form-control" id="address" name="Address" rows="3"
                                placeholder="Nhập địa chỉ giao hàng" required><?= $user['address'] ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5>Phương thức thanh toán</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="PaymentMethod" id="cod" value="cod"
                                checked>
                            <label class="form-check-label" for="cod">
                                Thanh toán khi giao hàng (COD)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PaymentMethod" id="vnpay"
                                value="vnpay">
                            <label class="form-check-label" for="vnpay">
                                Thanh toán bằng VNPAY
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Nút xác nhận -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-check-circle"></i> Xác nhận thanh toán
                    </button>
                </div>
            </form>
        </div>

        <!-- Thông tin giỏ hàng -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white text-center">
                    <h5>Thông tin giỏ hàng</h5>
                </div>
                <div class="card-body">
                    <!-- Danh sách sản phẩm -->
                    <ul class="list-group list-group-flush">
                        <?php foreach ($carts as $cart) : ?>
                            <li class="list-group-item d-flex align-items-center">
                                <!-- Hình ảnh sản phẩm -->
                                <div class="product-image me-3">
                                    <img src="<?= $cart['Image'] ?>" alt="<?= $cart['ProductName'] ?>" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                </div>
                                <!-- Thông tin sản phẩm -->
                                <div class="flex-grow-1">
                                    <h6 class="mb-1 text-truncate"><?= $cart['ProductName'] ?></h6>
                                    <small class="text-muted">Số lượng: <?= $cart['quantity'] ?></small>
                                </div>
                                <!-- Giá tiền -->
                                <span class="fw-bold text-primary"><?= number_format($cart['Price'] * $cart['quantity']) ?> VNĐ</span>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- Tổng tiền -->
                <div class="card-footer text-center">
                    <h5 class="mb-0">
                        Tổng tiền: <span class="text-danger"><?= number_format($totalPriceInOrder) ?> VNĐ</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>
