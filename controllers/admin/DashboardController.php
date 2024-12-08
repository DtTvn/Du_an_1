<?php

class DashboardController {
    protected $db;

    // Constructor: Khởi tạo kết nối cơ sở dữ liệu
    public function __construct() {
        $user = $_SESSION['user'] ?? [];
        if (!$user || $user['role'] != 'admin') {
            return header("location: " . ROOT_URL);
        }

        // Khởi tạo kết nối cơ sở dữ liệu
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=du_an1', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối cơ sở dữ liệu không thành công: " . $e->getMessage();
            exit;
        }
    }

    public function index() {
        // Tính tổng doanh thu
        $totalRevenue = $this->getTotalRevenue();

        // Tính tổng số đơn hàng
        $totalOrders = $this->getTotalOrders();

        // Lấy số người dùng mới
        $newUsers = $this->getNewUsers();

        // Lấy các đơn hàng mới
        $recentOrders = $this->getRecentOrders();

        // Truyền dữ liệu vào view
        return view('admin.dashboard', [
            'totalRevenue' => $totalRevenue,
            'totalOrders' => $totalOrders,
            'newUsers' => $newUsers,
            'recentOrders' => $recentOrders,
        ]);
    }

    // Phương thức lấy tổng doanh thu
    private function getTotalRevenue() {
        $query = "SELECT SUM(TotalPrice) AS total FROM orders";
        $result = $this->db->query($query);
        $row = $result->fetch();
        return $row['total'] ?? 0;
    }

    // Phương thức lấy tổng số đơn hàng
    private function getTotalOrders() {
        $query = "SELECT COUNT(*) AS total FROM orders";
        $result = $this->db->query($query);
        $row = $result->fetch();
        return $row['total'] ?? 0;
    }

    // Phương thức lấy số người dùng mới
    private function getNewUsers() {
        $query = "SELECT COUNT(*) AS total FROM users WHERE created_at > NOW() - INTERVAL 30 DAY";
        $result = $this->db->query($query);
        $row = $result->fetch();
        return $row['total'] ?? 0;
    }

// Phương thức lấy các đơn hàng mới với thông tin khách hàng
private function getRecentOrders() {
    $query = "
        SELECT o.id, u.FullName AS customer_name, o.TotalPrice, o.created_at, o.Status
        FROM orders o
        JOIN users u ON o.CustomerID = u.id
        ORDER BY o.created_at DESC
        LIMIT 5
    ";
    $result = $this->db->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);  // Trả về mảng kết quả
}
}
?>
