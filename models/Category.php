<<<<<<< HEAD
=======
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
    public function find($CategoryID)
    {
        $sql = "SELECT * FROM danhmucsanpham WHERE CategoryID=:CategoryID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['CategoryID' => $CategoryID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function edit($CategoryID, $data )
    {
        $sql = "UPDATE `danhmucsanpham` SET CategoryName = :CategoryName WHERE CategoryID=:CategoryID ";
        $stmt = $this->conn->prepare($sql);
        $data['CategoryID'] = $CategoryID;
        $stmt->execute($data);
    }
    public function update($CategoryID,$data){
        $sql = "UPDATE `danhmucsanpham` SET CategoryName=:CategoryName WHERE CategoryID=:CategoryID";
        $stmt = $this->conn->prepare($sql);
        $data['CategoryID'] = $CategoryID;
        $stmt->execute($data);
    }
    public function delete($CategoryID) {
        $sql = "DELETE FROM `danhmucsanpham` WHERE CategoryID=:CategoryID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['CategoryID' => $CategoryID]);
    }
}
>>>>>>> 8d6fd90706605db0c6c10ac666f66d8191d07cdb
