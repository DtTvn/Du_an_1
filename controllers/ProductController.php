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

    //hiển thị chi tiết
    public function show()
    {
        $id = $_GET['ProductID']; // id sanpham
        //Lấy ra sản phẩm theo id
        $product = (new Product)->find($id);
        //Lấy tên sản phẩm đưa và title
        $title = $product['ProductName'] ?? '';
        //lấy danh mục
        $categories = (new Category)->all();

        //Lưu URI vào session
        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

        //$totalQuantity = (new CartController)->totalQuantityCart();
        return view(
            'client.products.detail',
            compact('product', 'title', 'categories')
        );
    }
}
