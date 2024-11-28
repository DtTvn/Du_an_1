<?php
class User extends BaseModel{
     //lay toan bo users
     public function all(){
          $sql = "SELECT * FROM `users`";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO ::FETCH_ASSOC);
     }
     public function find($id){
          $sql = "SELECT * FROM `users` WHERE id=:id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(['id'=>$id]);
          return $stmt->fetch(PDO ::FETCH_ASSOC);
     }
     public function findUserOfEmail($email){
          $sql = "SELECT * FROM `users` WHERE email=:email";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(['email'=>$email]);
          return $stmt->fetch(PDO ::FETCH_ASSOC);
     }
     public function create($data){
          $sql = "INSERT INTO `users`( `FullName`, `Email`, `Password`, `Phone`, `role`, `active`, `address`, `created_at`, `updated_at`) VALUES (:FullName, :Email, :Password, :Phone, :role, :active, :address, :created_at, :updated_at)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute($data);
     }
     //Cập nhật user
    public function update($id, $data)
    {
        $sql = "UPDATE users SET Fullname=:Fullname, Phone=:Phone, Address=:Address, role=:role, active=:active WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //thêm id vào data
        $data['id'] = $id;
        $stmt->execute($data);
    }

    //cập nhật hoạt động của user (active)
    public function updateActive($id, $active)
    {
        $sql = "UPDATE users SET active=:active WHERE id=:id";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['id' => $id, 'active' => $active]);
    }
}
