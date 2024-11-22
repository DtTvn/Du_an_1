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
        $sql = "SELECT p.*, c.CategoryName FROM sanpham p JOIN danhmucsanpham c ON p.CategoryID=c.CategoryID WHERE c.CategoryID=:CategoryID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['CategoryID' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // lấy sản phẩm là table (type =2)
    public function listTable()
    {
        $sql = "SELECT p.*, c.CategoryName FROM sanpham p JOIN danhmucsanpham c ON p.CategoryID=c.CategoryID WHERE type=2 ORDER BY p.CategoryID DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //lấy sản phẩm ko phải table(type=1)
    public function listOtherProduct()
    {
        $sql = "SELECT p.*, c.CategoryName FROM sanpham p JOIN danhmucsanpham c ON p.CategoryID=c.CategoryID WHERE type=1 ORDER BY p.CategoryID DESC LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
<<<<<<< HEAD
        //Thêm dữ liệu
        public function create($data)
        {
            $sql = "INSERT INTO products(ProductName, Image, Price, Description, CategoryID, Material, Color, Dimensions) VALUES(:ProductName, :Image, :Price, :Description, :CategoryID, :Material, :Color, :Dimensions)";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
        }
=======
    //Thêm dữ liệu
    public function create($data)
    {
        $sql = "INSERT INTO products(ProductName, Image, Price, Description, CategoryID, Material, Color, Dimensions) VALUES(:ProductName, :Image, :Price, :Description, :CategoryID, :Material, :Color, :Dimensions)";
        
>>>>>>> 8d6fd90706605db0c6c10ac666f66d8191d07cdb

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //Cập nhật
    public function update($id, $data)
    {
        $sql = "UPDATE sanphm SET ProductName=:ProductName, Image=:Image, Price=:Price, Description=:Description, CategoryID=:CategoryID, Material:Material, Color:Color, Dimensions:Dimensions WHERE ProductId=:ProductIDid";

        $stmt = $this->conn->prepare($sql);
        //thêm id và mảng data
        $data['ProductID'] = $id;
        $stmt->execute($data);
    }
    //lấy ra 1 bản ghi
    public function find($id)
    {
        $sql = "SELECT * FROM sanpham WHERE ProductID=:ProductID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ProductID' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //tìm kiếm sản phẩm theo tên
    public function search($keyword = null)
    {
        $sql = "SELECT * FROM sanpham WHERE ProductName LIKE '%$keyword%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
