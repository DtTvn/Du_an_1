<?php
class Category extends BaseModel{
    // danh sách category
    public function all(){
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        // thực thi
        $stmt->execute();
        //trả lại dữ liệu
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    // thêm danh mục(category)
    public function create($data){
        $sql = "INSERT INTO categories(CategoryName) VALUES(CategoryName)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //Chi tiết 1 bản ghi
    public function find($CategoryID)
    {
        $sql = "SELECT * FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $CategoryID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }









    // public function edit($CategoryID, $data )
    // {
    //     $sql = "UPDATE `danhmucsanpham` SET CategoryName = :CategoryName WHERE CategoryID=:CategoryID ";
    //     $stmt = $this->conn->prepare($sql);
    //     $data['CategoryID'] = $CategoryID;
    //     $stmt->execute($data);
    // }
    // public function update($CategoryID,$data){
    //     $sql = "UPDATE `danhmucsanpham` SET CategoryName=:CategoryName WHERE CategoryID=:CategoryID";
    //     $stmt = $this->conn->prepare($sql);
    //     $data['CategoryID'] = $CategoryID;
    //     $stmt->execute($data);
    // }
    // public function delete($CategoryID) {
    //     $sql = "DELETE FROM `danhmucsanpham` WHERE CategoryID=:CategoryID";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['CategoryID' => $CategoryID]);
    // }
}