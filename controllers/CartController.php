<?php

class CartController
{
    public function addCart()
    {

        $carts = $_SESSION['cart'] ?? []; //tạo giỏ hàng

        //lấy id để thêm vào giỏ hàng
        $id = $_GET['id'];
        //lấy sản phẩm theo id
        $product = (new Product)->find($id);
        //Kiểm tra sản phẩm có trong giỏ hàng
        if (isset($carts[$id])) {
            $carts[$id]['quantity'] += 1;
        } else {
            $carts[$id] = [
                'ProductName' => $product['ProductName'],
                'Image' => $product['Image'],
                'Price' => $product['Price'],
                'quantity' => 1
            ];
        }
        //Lưu giỏ hàng vào session
        $_SESSION['cart'] = $carts;

        //Lưu số lượng sản phẩm trong giỏ hàng
        $_SESSION['totalQuantity'] = $this->totalQuantityCart($carts);

        $uri = $_SESSION['URI']; //Lấy đường dẫn
        header("location: " . $uri);
    }

    //tình tổng số lượng sản phẩm trong giỏ hàng
    public function totalQuantityCart($carts)
    {
        $totalQuantity = 0;
        foreach ($carts as $cart) {
            $totalQuantity += $cart['quantity'];
        }
        return $totalQuantity;
    }

    //Tính tổng tiền trong giỏ hàng
    public function totalPriceInOrder()
    {
        $carts = $_SESSION['cart'] ?? [];

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['Price'] * $cart['quantity'];
        }
        return $total;
    }

    //Hiển thị giỏ hàng
    public function viewCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceInOrder = $this->totalPriceInOrder();

        $categories = (new Category)->all();

        return view('client.carts.cart', compact('carts', 'totalPriceInOrder', 'categories'));
    }

    //Xóa sản phẩm trong giỏ hàng
    public function deleteProductInCart()
    {
        //lấy id sản phẩm
        $id = $_GET['id'];
        //Xóa sản phẩm trong giỏ hàng
        unset($_SESSION['cart'][$id]);
        //chuyển về giỏ hàng
        return header("location: " . ROOT_URL . '?ctl=view-cart');
    }

    //Cập nhật giỏ hàng
    public function updateCart()
    {

        $quantities = $_POST['quantity'];
        foreach ($quantities as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
        return header("Location: " . ROOT_URL . '?ctl=view-cart');
    }
    // Hiện thông tin Thanh toán
    public function viewCheckOut(){
        // if(!isset($_SESSION['user'])){
        //     return header("Location" . ROOT_URL .'?ctl=login');
        // }
        // $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceInOrder = $this->totalPriceInOrder();
        return view("client.carts.checkout",compact('carts','totalPriceInOrder'));

    }
    //Thanh toán
    public function checkOut(){
        $data= $_POST;
        dd($_POST);
    }
}
