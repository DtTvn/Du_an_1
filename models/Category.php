<?php 
    // Model Category thao tác với categories 
    class Category extends BaseModel{
        // Phuong thuc  all lấy ra tòa bộ dữ liệu bảng catefories 
        public function all(){
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        //Phương thức create tạo mới dữ liệu
        // @data là mảng dữ liệu cần thêm
        public function create($data){
            $sql = "INSERT INTO `categories`(`CategoryName`) VALUES (:CategoryName)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
        }

        //Phuong thuc update : cap nhap du lieu
        //@id: ma danh muc
        //@data: mang du lieu cap nhap
        public function update($id, $data){
            $sql = "UPDATE `categories` SET `CategoryName`='CategoryName' WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            //Thêm id va data
            $data['id'] = $id;
            $stmt->execute($data);
        }

        //Phương thức find tìm danh mục theo id 
        //@id mã danh mục cần tìm
        public function find($id){
            $sql = "SELECT * FROM `categories` WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        //Phuong thu delete Xoa du lieu
        // @id ma danh muc can xoa

        public function delete($id){
            $sql = "DELETE FROM `categories` WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
        }
    }
?>