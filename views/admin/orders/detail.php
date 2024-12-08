<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">
    <?php if ($message != "") : ?>
        <div class="alert alert-success">
            <?= $message ?>
        </div>
    <?php endif ?>
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

            <!-- Cập nhật trạng thái đơn hàng -->
            <div class="mb-4">
                <h5>Cập nhật trạng thái đơn hàng</h5>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="orderStatus" class="form-label">Trạng thái đơn hàng</label>
                        <select id="orderStatus" name="status" class="form-select">
                            <?php foreach ($status as $key => $value): ?>
                                <option value="<?= $key ?>" <?= $order['Status'] == $key ? 'selected' : '' ?>
                                    <?php
                                    if ($order['Status'] == 2 && in_array($key, [1, 4])) {
                                        echo "disabled";
                                    } elseif ($order['Status'] == 3 && in_array($key, [1, 2, 4])) {
                                        echo "disabled";
                                    } elseif ($order['Status'] == 4 && in_array($key, [1, 2, 3])) {
                                        echo "disabled";
                                    }
                                    ?>>
                                    <?= $value ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>

            <!-- Nút thao tác -->
            <div class="d-flex justify-content-between">
                <a href= "<?=ADMIN_URL . '?ctl=list-order' ?>" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>