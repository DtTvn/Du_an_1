<?php
class Category extends BaseModel{
    // danh sách category
    public function all(){
        $sql = "SELECT * FROM `danhmucsanpham`";
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
    // public function find($CategoryID)
    // {
    //     // $sql = "SELECT * FROM danhmucsanpham WHERE CategoryID=:CategoryID";
    //     $sql = "SELECT `CategoryName` FROM `danhmucsanpham` WHERE `CategoryID`= ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['CategoryID' => $CategoryID]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }
    public function update($CategoryID,$data){
        $sql = "UPDATE `danhmucsanpham` SET CategoryName=:CategoryName WHERE CategoryID=:CategoryID";
        // $sql = "UPDATE `danhmucsanpham` SET `CategoryName`=? WHERE `CategoryName`= ?";
        $stmt = $this->conn->prepare($sql);
        $data['CategoryID'] = $CategoryID;
        $stmt->execute($data);
    }
    public function delete($CategoryID) {
        $sql = "DELETE FROM `danhmucsanpham` WHERE $CategoryID= ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['CategoryID' => $CategoryID]);
    }
}