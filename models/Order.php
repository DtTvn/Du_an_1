<?php

class Order extends BaseModel
{
    //tất cả hóa đơna
    public function all()
    {
        $sql = "SELECT o.*, Fullname, Email, Address, Phone FROM orders o JOIN users u ON o.CustomerID=u.id ORDER BY o.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //chi tiết hóa đơn
    public function find($id)
    {
        $sql = "SELECT o.*, Fullname, Email, Address, Phone, od.TotalPrice, od.Quantity, ProductName, Image 
        FROM orders o JOIN users u ON o.CustomerID=u.id 
        JOIN order_details od ON od.OrderID=o.id 
        JOIN products p ON od.ProductID=p.id 
        WHERE o.id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    //Thêm hóa đơn
    public function create($data)
    {
        $sql = "INSERT INTO orders(CustomerID, Status, PaymentMethod, TotalPrice) VALUES(:CustomerID, :Starus, :PaymentMethod, :TotalPrice)";
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
