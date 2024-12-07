<?php include_once ROOT_DIR . "views/client/header.php" ?>

<div class="container mt-5">
    <!-- Phần thông tin khách hàng -->
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Thông tin khách hàng</h4>
        </div>
        <div class="card-body">
            <p><strong>Họ tên:</strong> <?= $user['FullName'] ?></p>
            <p><strong>Email:</strong> <?= $user['Email'] ?></p>
            <p><strong>Điện thoại:</strong> <?= $user['Phone'] ?></p>
            <p><strong>Địa chỉ:</strong> <?= $user['address'] ?></p>
        </div>
    </div>

    <!-- Danh sách đơn hàng -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Danh sách đơn hàng</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Ngày mua</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['PaymentMethod'] ?></td>
                                <td>
                                    <span class="badge 
                                        <?= $order['Status'] == 'Completed' ? 'bg-success' : ($order['Status'] == 'Pending' ? 'bg-warning' : 'bg-danger') ?>">
                                        <?= getOrderStatus($order['Status']) ?>
                                    </span>
                                </td>
                                <td class="text-end"><?= number_format($order['TotalPrice']) ?> VNĐ</td>
                                <td><?= date('d-m-Y H:i:s', strtotime($order['created_at'])) ?></td>
                                <td>
                                    <a href="<?= ROOT_URL . '?ctl=order-detail-user&id=' . $order['id'] ?>" 
                                       class="btn btn-outline-primary btn-sm">
                                       <i class="bi bi-info-circle"></i> Chi tiết
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>
