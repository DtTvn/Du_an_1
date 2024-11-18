<?php
class HomeController
{
    public function index()
    {
        //Lấy danh sách pets
        // $product = new Product;
        // $pets = $product->listPets();
        // $list_products = $product->listOtherProduct();

        //Danh mục
        $categories = (new Category)->all();

        return view(
            'client.home',
            compact('pets', 'list_products', 'categories')
        );
    }
}
?>
