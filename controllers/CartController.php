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
        if(!isset($_SESSION['user'])){
            return header("location:" . ROOT_URL .'?ctl=login');
        }
        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceInOrder = $this->totalPriceInOrder();
        return view("client.carts.checkout",compact('user','carts','totalPriceInOrder'));

    }
    //Thanh toán
    public function checkOut(){
        //lấy thông tin người dùng
        $user = [
            'id' => $_POST['id'],
            'FullName' => $_POST['FullName'],
            'Phone' => $_POST['Phone'],
            'address' => $_SESSION['user']['address'],
            'role' => $_SESSION['user']['role'],
            'active' => $_SESSION['user']['active'],
        ];
        $totalPriceInOrder = $this->totalPriceInOrder();
        //lấy thông tin thanh toán
        $order = [
            'CustomerID' => $_POST['id'],
            'Status' => 1,
            'PaymentMethod' => $_POST['PaymentMethod'],
            'TotalPrice' => $totalPriceInOrder,
        ];
        //lưu thông tin người dùng
        (new User)-> update($user['id'],$user);
        //lưu thông tin đơn hàng
        $order_id = (new Order)->create($order);

        //lưu thông tin chi tiết
        $carts = $_SESSION['cart'];
        foreach($carts as $id => $cart){
            $or_detial = [
                'OrderID' => $order_id,
                'ProductID' => $id,
                'Quantity' => $cart['quantity'],
                'UnitPrice' => $cart['Price'],
            ];
            (new Order)->createOrderDetail($or_detial);
        }
        $this->clearCart();// xóa thông tin giỏ hàng
        return header("Location:" . ROOT_URL. '?ctl=success');

    }
    //xóa giỏ hàng
    public function clearCart(){
        unset($_SESSION['cart']);
        unset($_SESSION['URI']);
    }
    public function success(){
        return view("client.carts.success");
    }
}
