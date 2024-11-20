<?php

class ProductController
{
    // Hàm list sẽ lấy các sản phẩm theo danh mục
    public function list()
    {
        $id = $_GET['CategoryID']; // ID danh mục

        // Lấy sản phẩm theo danh mục
        $products = (new Product)->listProductInCategory($id);

        $title = '';
        if ($products) {
            $title = $products[0]['CategoryName']; // Lấy tên danh mục từ sản phẩm
        }

        // Lấy danh mục
        $categories = (new Category)->all();

        // Truyền dữ liệu vào view
        return view(
            'client.products.category',
            compact('products', 'categories', 'title')
        );
    }
}
