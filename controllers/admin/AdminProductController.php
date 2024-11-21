<?php 
//AdminProductController Điều sản phẩm
    class AdminProductController {
        // Hàm index để hiển thị sản phẩm
        public function index() {
            $sanpham = (new $Sanpham ) -> all();
        }
    }
?>