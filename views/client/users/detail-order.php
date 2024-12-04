<?php include_once ROOT_DIR . "views/client/header.php" ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4>Chi tiết đơn hàng</h4>
        </div>
        <div class="card-body">
            <!-- Thông tin đơn hàng -->
            <div class="mb-4">
                <h5>Mã đơn hàng: #<?= $order['id'] ?></h5>
                <p><strong>Ngày đặt hàng:</strong>
                    <?= date('d-m-Y H:i:s', strtotime($order['created_at'])) ?>
                </p>
                <p><strong>Trạng thái:</strong><span><?= getOrderStatus($order['Status']) ?></span></p>
            </div>

            <!-- Thông tin khách hàng -->
            <div class="mb-4">
                <h5>Thông tin khách hàng</h5>
                <p><strong>Họ tên:</strong><?= $order['FullName'] ?></p>
                <p><strong>Email:</strong><?= $order['Email'] ?></p>
                <p><strong>Điện thoại:</strong> <?= $order['Phone'] ?></p>
                <p><strong>Địa chỉ:</strong><?= $order['address'] ?></p>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="mb-4">
                <h5>Danh sách sản phẩm</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order_details as $stt => $detail): ?>
                            <tr>
                                <td><?= $stt + 1 ?></td>
                                <td><?= $detail['ProductName'] ?></td>
                                <td>
                                    <img src="<?= ROOT_URL . $detail['Image'] ?>" alt="" width="120">
                                </td>
                                <td><?= $detail['Quantity'] ?></td>
                                <td><?= number_format($detail['UnitPrice']) ?></td>
                                <td><?= number_format($detail['UnitPrice'] * $detail['Quantity']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-end">Tổng cộng:</th>
                            <th><?= number_format($order['TotalPrice']) ?>VNĐ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div>
                <a href="<?= ROOT_URL . "?ctl=list-order" ?>">Quay lại danh sách đơn hàng</a>
                <?php if($order['Status'] == 1) : ?>
                <form action="" method="post">
                    <button class="btn btn-danger">Hủy đơn hàng</button>
                </form>
                <?php endif?>
            </div>
        </div>
    </div>
</div>
<?php include_once ROOT_DIR . "views/client/footer.php" ?>