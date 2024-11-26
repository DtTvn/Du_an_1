<?php
class HomeController
{
    public function index()
    {
        // Lấy danh sách
        $product = new Product;
        $tables = $product->listOtherProduct();
        // $list_products = $product -> listOtherProduct();

        $categories = (new Category)->all();
        $title = 'trang chủ website';
        return view(
            'client.home',
            compact('tables','title','categories')
        );
    }
}

?>