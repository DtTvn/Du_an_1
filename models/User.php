<?php
class User extends BaseModel
{

     // Get all users
     public function all()
     {
          $sql = "SELECT * FROM `users`";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     // Find user by ID
     public function find($id)
     {
          $sql = "SELECT * FROM `users` WHERE id = :id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(['id' => $id]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     // Find user by email
     public function findUserOfEmail($email)
     {
          $sql = "SELECT * FROM `users` WHERE email = :email";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(['email' => $email]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     // Create a new user
     public function create($data)
     {
          $sql = "INSERT INTO `users` (`FullName`, `Email`, `Password`, `Phone`, `address`) 
               VALUES (:FullName, :Email, :Password, :Phone, :address)";
          $stmt = $this->conn->prepare($sql);
          if ($stmt->execute($data)) {
               return $this->conn->lastInsertId(); // Return the new user's ID
          }
          return false; // Return false if creation failed
     }

     // Update user by ID
     public function update($id, $data)
     {
          $sql = "UPDATE `users` SET 
                    `FullName` = :FullName,
                    `Email` = :Email,
                    `Password` = :Password,
                    `Phone` = :Phone,
                    `role` = :role,
                    `active` = :active,
                    `address` = :address,
                    `created_at` = :created_at,
                    `updated_at` = :updated_at 
               WHERE `id` = :id";
          $stmt = $this->conn->prepare($sql);
          $data['id'] = $id; // Add ID to the data array
          return $stmt->execute($data); // Return true if the update was successful
     }
}
