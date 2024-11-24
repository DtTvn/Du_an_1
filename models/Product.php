<?php
class Product extends BaseModel
{
    //lấy toàn bộ sản phẩm
    public function all()
    {
        $sql = "SELECT p.*, c.CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Lấy danh sách sản phẩm theo danh mục
    //@id mã danh mục
    public function listProductInCategory($id)
    {
        $sql = "SELECT p.*, c.CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id WHERE c.id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // lấy sản phẩm là table (type =2)
    public function listTable()
    {
        $sql = "SELECT p.*, c.CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id WHERE type=2 ORDER BY p.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //lấy sản phẩm ko phải table(type=1)
    public function listOtherProduct()
    {
        $sql = "SELECT p.*, c.CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id ORDER BY p.id DESC LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //lấy ra 1 bản ghi
    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //tìm kiếm sản phẩm theo tên
    public function search($keyword = null)
    {
        $sql = "SELECT * FROM products WHERE ProductName LIKE '%$keyword%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>