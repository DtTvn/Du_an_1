<?php

class Product extends BaseModel
{
    //lấy toàn bộ sản phẩm
    public function all()
    {
        $sql = "SELECT p.*, c.CategoryName FROM sanpham p JOIN danhmucsanpham c ON p.CategoryID=c.CategoryID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Lấy danh sách sản phẩm theo danh mục
    //@id mã danh mục
    public function listProductInCategory($id)
    {
        $sql = "SELECT p.*, c.CategoryName FROM sanpham p JOIN danhmucsanpham c ON p.CategoryID=c.CategoryID WHERE c.CategoryID=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}