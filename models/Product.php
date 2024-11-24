<?php 
    //Model Product lamf viec voi bang products
    class Product extends BaseModel{
        //Lấy toàn bộ dữ liệu 
        public function all(){
            // Lay toan bo du lieu
            $sql = "SELECT p.*, CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //Lấy dữ liệu theo danh muc
        public function listProductInCategory($id){
            $sql = "SELECT p.*, CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id WHERE c.id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //Them du lieu
        public function create($data){
            $sql = "INSERT INTO `products`(ProductName, CategoryID, Price, Description, Material, Color, Dimensions, Image) VALUES (:ProductName, :CategoryID, :Price, :Description, :Material, :Color, :Dimensions, :Image)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
        }

        //Cap nhat du lieu
        public function update($id,$data){
            $sql = "UPDATE `products` SET ProductName=:ProductName,CategoryID=:CategoryID,Price=:Price,Description=:Description,Material=:Material,Color=:Color,Dimensions=:Dimensions,Image=:Image WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            //Them id vao mang
            $data['id'] = $id;
            $stmt->execute($data);
        }

        //Xoa du lieu 
        public function delete($id){
            $sql = "DELETE FROM `products` WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
        }

        //Lay 1 san pham theo id
        public function find($id){
            $sql = "SELECT p.*, CategoryName FROM products p JOIN categories c ON p.CategoryID=c.id WHERE p.id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
        }
    }
?>