<?php
class OrderController{
    public function index(){
        $orders = (new Order)->all();
        return view("admin/orders/list",compact('orders'));
    }
    
    public function showOrder(){
        $id = $_GET['id'];

        // thay đổi trạng thái status
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $status = $_POST['status']; // 'status' là name ở detail
            (new Order)->updateStatus($id,$status); 
        }
        $order=(new Order)->find($id);

        $order_details=(new Order)->listOrderDetail($id);

        $status = (new Order)->status_details;
        return view("admin.orders.detail",compact('order','order_details','status'));
    }

    //hiển thị danh sách hóa đơn của user theo id
    public function showOrderUser(){
        $user_id = $_SESSION['user']['id'];

        $orders = (new Order)->findOrderUser($user_id);

        $categories = (new Category)-> all();
        $user = $_SESSION['user'];

        return view("client.users.list-order",compact('orders','categories','user'));
    }

    public function detailOrderUser(){
        $id = $_GET['id'];

        // thay đổi trạng thái status
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            (new Order)->updateStatus($id, 4); 
        }
        $order=(new Order)->find($id);

        $order_details=(new Order)->listOrderDetail($id);

        $status = (new Order)->status_details;
        return view("client.users.detail-order",
        compact('order','order_details','status'));
    }
}

?>