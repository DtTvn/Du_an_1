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
     public function update($id,$data){
          $sql = "UPDATE `users` SET `FullName`=:FullName,`Email`=:Email,`Password`=:Password,`Phone`=:Phone,`role`=:role,`active`=:active,`address`=:address,`created_at`=:created_at,`updated_at`=:updated_at WHERE `id`=:id";
          $stmt = $this->conn->prepare($sql);
          $data['id'] = $id;
          $stmt->execute($data);
     }
}
