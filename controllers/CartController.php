<?php

class CartController{
     public function addCart(){
          $carts = $_SESSION['cart'] ?? [];
          $id = $_GET['id'];
          $products = (new Product)->find($id);
          if (isset($carts[$id])) {
               $carts[$id]['quantity'] +=1;
          }else {
               $carts[$id] = [
                    'name' =>$products['name'],
                    'image' => $products['image'],
                    'price' => $products['price'],
                    'quantity' =>1
               ];
          }
          $_SESSION['cart'] = $carts;

          $_SESSION['totalQuantity'] = $this->totalQuantityCart($carts);

          $uri = $_SESSION['URI'];
          header("location:" .$uri);
     }

     public function totalQuantityCart($carts) {
          $totalquantity = 0;
          foreach ($carts as $cart) {
               $totalquantity += $cart['quantity'];
          }
          return $totalquantity;
     }

     public function totalPriceInOrder(){
          $carts =$_SESSION['cart'] ?? [];

          $total = 0;
          foreach($carts as $cart) {
               $total += $cart['price'] * $cart['quantity'];
          }
          return $total;
     }

     public function viewCart(){
          $carts = $_SESSION['cart'] ?? [];
          $totalPriceInOrder = $this->totalPriceInOrder();

          return view('client.carts.cart', compact('carts', 'totalPriceInOrder'));
     }
}