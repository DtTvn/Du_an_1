<?php include_once ROOT_DIR . "views/client/header.php" ?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h3>Chi tiết đơn hàng</h3>
        </div>
        <div class="card-body">
            <!-- Thông tin đơn hàng -->
            <div class="border-bottom pb-3 mb-4">
                <h5 class="text-primary">Mã đơn hàng: <span class="fw-bold">#<?= $order['id'] ?></span></h5>
                <p class="mb-1"><strong>Ngày đặt hàng:</strong> <?= date('d-m-Y H:i:s', strtotime($order['created_at'])) ?></p>
                <p class="mb-1"><strong>Trạng thái:</strong> 
                    <span class="badge <?= $order['Status'] == 1 ? 'bg-warning' : 'bg-success' ?>">
                        <?= getOrderStatus($order['Status']) ?>
                    </span>
                </p>
            </div>

            <!-- Thông tin khách hàng -->
            <div class="border-bottom pb-3 mb-4">
                <h5 class="text-primary">Thông tin khách hàng</h5>
                <p><strong>Họ tên:</strong> <?= $order['FullName'] ?></p>
                <p><strong>Email:</strong> <?= $order['Email'] ?></p>
                <p><strong>Điện thoại:</strong> <?= $order['Phone'] ?></p>
                <p><strong>Địa chỉ:</strong> <?= $order['address'] ?></p>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="mb-4">
                <h5 class="text-primary">Danh sách sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-end">Giá</th>
                                <th class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_details as $stt => $detail): ?>
                                <tr>
                                    <td><?= $stt + 1 ?></td>
                                    <td><?= $detail['ProductName'] ?></td>
                                    <td>
                                        <img src="<?= ROOT_URL . $detail['Image'] ?>" alt="<?= $detail['ProductName'] ?>" class="img-thumbnail" style="width: 100px; height: auto;">
                                    </td>
                                    <td class="text-center"><?= $detail['Quantity'] ?></td>
                                    <td class="text-end"><?= number_format($detail['UnitPrice']) ?> VNĐ</td>
                                    <td class="text-end"><?= number_format($detail['UnitPrice'] * $detail['Quantity']) ?> VNĐ</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-end fw-bold fs-5">Tổng cộng:</th>
                                <th class="text-end text-danger fw-bold fs-5"><?= number_format($order['TotalPrice']) ?> VNĐ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Nút hành động -->
            <div class="d-flex justify-content-between mt-4">
                <a href="<?= ROOT_URL . "?ctl=list-order" ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Quay lại danh sách đơn hàng
                </a>
                <?php if ($order['Status'] == 1) : ?>
                    <form action="" method="post" class="d-inline-block">
                        <button class="btn btn-danger">
                            <i class="bi bi-x-circle"></i> Hủy đơn hàng
                        </button>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>
