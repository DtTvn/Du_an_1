<?php 
// Lớp BaseModel chứa thông tin kết nối
class BaseModel 
{
    // Biến conn lưu trữ thông tin kết nối
    public $conn = null;

    // Hàm khởi tạo
    public function __construct()
    {
        try {
            // Kiểm tra xem các hằng số đã được định nghĩa chưa
            if (!defined('HOST') || !defined('DBNAME') || !defined('PORT') || !defined('USERNAME') || !defined('PASSWORD')) {
                throw new Exception("Thiếu thông tin kết nối. Vui lòng kiểm tra lại các hằng số!");
            }

            // Kết nối cơ sở dữ liệu
            $this->conn = new PDO(
                "mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8;port=" . PORT, 
                USERNAME, 
                PASSWORD
            );

            // Thiết lập chế độ lỗi của PDO (tùy chọn, nên sử dụng)
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>
