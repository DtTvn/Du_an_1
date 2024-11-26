<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Giỏ hàng của bạn</h1>
        <form action="update-cart.php" method="POST">
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
                        <?php foreach ($cart as $id => $cart) : ?>
                        <tr>
                            <th scope="row"><?= $id?></th>
                            <td>
                                <img src="<?= $cart['Image']?>" alt="<?= $cart['ProductName']?>" class="img-thumbnail"
                                    style="width: 80px; height: auto;">
                            </td>
                            <td><?= $cart['ProductName']?></td>
                            <td><?= number_format($cart['Price'])?></td>
                            <td>
                                <input type="number" name="quantity[1]" class="form-control" value="2" min="1"
                                    style="width: 80px;">
                            </td>
                            <td>1.000.000 VNĐ</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <!-- Tổng tiền -->
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                            <td colspan="2" class="fw-bold text-danger">1.300.000 VNĐ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Nút hành động -->
            <div class="d-flex justify-content-between mt-4">
                <a href="shop.html" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Tiếp tục mua sắm
                </a>
                <div>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-arrow-clockwise"></i> Cập nhật giỏ hàng
                    </button>
                    <button type="button" class="btn btn-success">
                        <i class="bi bi-credit-card"></i> Thanh toán
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>