<?php

class Order extends BaseModel
{
    public $status_details = [
        1 => 'Chờ xác nhận',
        2 => 'Chờ giao hàng',
        3 => 'Đã giao',
        4 => 'Đã hủy',
    ];

    //tất cả hóa đơn
    public function all()
    {
        $sql = "SELECT o.*, FullName, Email, Address, Phone FROM orders o JOIN users u ON o.CustomerID=u.id ORDER BY o.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //chi tiết hóa đơn
    public function find($id)
    {
        $sql = "SELECT o.*, FullName, Email, address, Phone
        FROM orders o JOIN users u ON o.CustomerID=u.id 
        WHERE o.id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //chi tiết hóa đơn theo user
    public function findOrderUser($user_id){
        $sql = "SELECT o.*, FullName, Email, address, Phone
        FROM orders o JOIN users u ON o.CustomerID=u.id 
        WHERE o.CustomerID=:CustomerID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['CustomerID' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    //danh sách sản phẩm của hóa đơn
    public function listOrderDetail($id){
        $sql = "SELECT od.*, ProductName,Image 
        FROM order_details od JOIN products p 
        ON od.ProductID = p.id
        WHERE od.OrderID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Thêm hóa đơn
    public function create($data)
    {
        $sql = "INSERT INTO orders(CustomerID, Status, PaymentMethod, TotalPrice) VALUES(:CustomerID, :Status, :PaymentMethod, :TotalPrice)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }

    //Cập nhật trạng thái
    public function updateStatus($id, $status)
    {
        $sql = "UPDATE orders SET Status=:Status WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id, 'Status' => $status]);
    }

    //Thêm chi tiết đơn hàng
    public function createOrderDetail($data) 
    {
        $sql = "INSERT INTO order_details(OrderID, ProductID, Quantity, UnitPrice) VALUES(:OrderID, :ProductID, :Quantity, :UnitPrice)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}