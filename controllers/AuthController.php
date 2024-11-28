<?php

class AuthController {
     //Đăng kí
     public function register(){
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $data = $_POST;
               //Ma hoa mat khau
               $password = $_POST['Password'];
               $password = password_hash($password, PASSWORD_DEFAULT);

               //dua vao data
               $data['Password'] = $password;

               // insert vaof database
               (new User)->create($data);

               //thong bao
               $_SESSION['message'] = 'Dang ky Thanh cong';
               header('location:' . ROOT_URL . "?ctl=login");

          }
          return view('client.users.register');
     }

     //Dang nhap
     public function login() {
          // kiem tra xem nguoi dung dang nhap chua
          if (isset($_SESSION['user'])) {
               header("location:" . ROOT_URL);
          }
          $error = null;
          if ($_SERVER['REQUEST_METHOD'] === "POST") {
               $email = $_POST['Email'];
               $password = $_POST['Password'];

               $user = (new User)->findUserOfEmail($email);

               //kiem tra mat khau
               if ($user) {
                    if (password_verify($password, $user['Password'])) {
                         //dang nhap thanh cong
                         $_SESSION['user'] = $user;
                         //neu rolr = admon, vao admin, nguowc lai vao trang chu
                         if($user['role']== 'admin'){
                              header("location: " .ADMIN_URL);
                         }
                         header("location: " . ROOT_URL);
                    }else{
                         $error = "Email hoawc Mat Khau Khong dung";
                    }
               }else{
                    $error = "Email hoawc Mat Khau Khong dung";
               }
          }
          $message = session_flash('message');
          return view('client.users.login',compact('message', 'error'));
     }
     //dang xuat
     public function logout(){
          unset($_SESSION['user']);
          header("location:" . ROOT_URL . '?ctl=login');
     }
     
     public function index(){
          $users = (new User)->all();
          return view('admin.users.list', compact('users'));
     }

     public function updateActive(){
          $data = $_POST;

          $data['active'] = $data['active']? 0 : 1;

          (new User)->updateActive($data['id'],$data['active']);
          return header('Location: ' . ADMIN_URL . '?ctl=listuser');
     }
}