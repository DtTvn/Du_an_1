<?php include_once ROOT_DIR . "views/client/header.php" ?>
<div class="container">
    <div>
        <!-- Thông tin khách hàng -->
        <div class="mb-4">
            <h5>Thông tin khách hàng</h5>
            <p><strong>Họ tên:</strong><?=$user['FullName']?></p>
            <p><strong>Email:</strong><?=$user['Email']?></p>
            <p><strong>Điện thoại:</strong><?=$user['Phone']?></p>
            <p><strong>Địa chỉ:</strong><?=$user['address']?></p>
        </div>
    </div>
    <table class="table">
        <thead>
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
                    <th scope="row"><?= $order['id'] ?></th>
                    <td><?= $order['PaymentMethod'] ?></td>
                    <td><?= getOrderStatus($order['Status']) ?></td>
                    <td><?= number_format($order['TotalPrice']) ?>VNĐ</td>
                    <td><?= $order['created_at'] ?></td>
                    <td>
                        <a href="<?= ROOT_URL . '?ctl=order-detail-user&id=' . $order['id'] ?>" class="btn btn-primary">Chi tiết</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include_once ROOT_DIR . "views/client/footer.php" ?>