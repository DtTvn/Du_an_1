<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Card: Tổng doanh thu -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tổng Doanh Thu</h5>
                    <p class="card-text"><?= number_format($totalRevenue, 0, ',', '.') ?> VNĐ</p>
                </div>
            </div>
        </div>

        <!-- Card: Tổng số đơn hàng -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tổng Đơn Hàng</h5>
                    <p class="card-text"><?= $totalOrders ?> đơn</p>
                </div>
            </div>
        </div>

        <!-- Card: Người dùng mới -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Người Dùng Mới</h5>
                    <p class="card-text"><?= $newUsers ?> người</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ doanh thu -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Biểu đồ Doanh Thu Tháng</h3>
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Các đơn hàng mới -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Đơn Hàng Mới</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Mua</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recentOrders as $order) : ?>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= $order['customer_name'] ?></td> <!-- Sử dụng customer_name -->
                            <td><?= number_format($order['TotalPrice'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= date('d/m/Y', strtotime($order['created_at'])) ?></td>
                            <td><?= getOrderStatus($order['Status']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Thêm thư viện Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script vẽ biểu đồ doanh thu -->
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5'], // Các tháng trong năm
            datasets: [{
                label: 'Doanh Thu Tháng',
                data: [5000000, 7000000, 8000000, 6000000, 7500000], // Doanh thu theo tháng
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        }
    });
</script>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
