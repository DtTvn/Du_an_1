<?php
class SearchController {
    public function search() {
        // Lấy từ khóa tìm kiếm
        $keyword = $_GET["keyword"];
        // Lấy dữ liệu tìm được
        $tables = (new Product)->search($keyword);
        $categories = (new Category)->all();
        $title = 'Trang chủ website';

        // Truyền dữ liệu đúng cách vào view
        return view("client.search", compact('title', 'categories', 'keyword', 'tables'));
    }
}

?>