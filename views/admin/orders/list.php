<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="page-content p-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách đơn hàng</h2>
        </div>

        <!-- Table responsive with full width -->
        <div class="table-responsive" style="width: 100%;">
            <table class="table table-striped table-hover table-bordered align-middle" style="width: 100%; table-layout: fixed;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order):?>
                        <tr>
                            <th scope="row"><?= $order['id']?></th>
                            <td><?= $order['FullName']?></td>
                            <td><?= $order['Phone']?></td>
                            <td><?= $order['PaymentMethod']?></td>
                            <td><?= getOrderStatus($order['Status'])?></td>
                            <td><?= number_format($order['TotalPrice'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= date('d/m/Y', strtotime($order['created_at']))?></td>
                            <td class="text-center">
                                <a href="<?= ADMIN_URL . '?ctl=detail-order&id=' . $order['id'] ?>" class="btn btn-primary btn-sm" style="width: 100px;">Cập nhật</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
