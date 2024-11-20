<?php
class Category extends BaseModel{
    // danh sách category
    public function all(){
        $sql = "SELECT * FROM danhmucsanpham WHERE soft_delete = 0";
        $stmt = $this->conn->prepare($sql);
        // thực thi
        $stmt->execute();
        //trả lại dữ liệu
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    // thêm danh mục(category)
    public function create($data){
        $sql = "INSERT INTO danhmucsanpham(CategoryName,type) VALUES(:CategoryName, :type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //Chi tiết 1 bản ghi
    public function find($id)
    {
        $sql = "SELECT * FROM danhmucsanpham WHERE CategoryID=:CategoryID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['CategoryID' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}