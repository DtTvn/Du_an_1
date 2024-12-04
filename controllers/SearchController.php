<?php
class SearchController {
    public function search() {
        // Lấy từ khóa và khoảng giá từ query string
        $keyword = $_GET["keyword"] ?? '';
        $minPrice = $_GET["minPrice"] ?? 0;
        $maxPrice = $_GET["maxPrice"] ?? PHP_INT_MAX;

        // Lọc sản phẩm theo tên và khoảng giá
        $tables = (new Product)->filterByNameAndPrice($keyword, $minPrice, $maxPrice);
        $categories = (new Category)->all();
        $title = 'Trang tìm kiếm';

        // Truyền dữ liệu vào view
        return view("client.search", compact('title', 'categories', 'keyword', 'tables', 'minPrice', 'maxPrice'));
    }
}


?>