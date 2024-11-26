<?php

class AuthController {
     //Đăng kí
     public function register(){
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $data = $_POST;
               //Ma hoa mat khau
               $password = $_POST['password'];
               $password = password_hash($password, PASSWORD_DEFAULT);

               //dua vao data
               $data['password'] = $password;

               // insert vaof database
               (new User)->create($data);

               //thong bao
               $_SESSION['message'] = 'Dang ky Thanh cong';
               header('localtion:' . ROOT_URL . "?ctl=login");

          }
          return view('client.users.register');
     }

     //Dang nhap
     public function login() {
          // kiem tra xem nguoi dung dang nhap chua
          if (isset($_SESSION['user'])) {
               header("localtion:" . ROOT_URL);
               die;
          }
          $error = null;
          if ($_SERVER['REQUEST_METHOD'] === "POST") {
               $email = $_POST['email'];
               $password = $_POST['password'];

               $user = (new User)->findUserOfEmail($email);

               //kiem tra mat khau
               if ($user) {
                    if (password_verify($password, $user['password'])) {
                         //dang nhap thanh cong
                         $_SESSION['user'] = $user;
                         //neu rolr = admon, vao admin, nguowc lai vao trang chu
                         if($user['role']== 'admin'){
                              header("localtion:" .ADMIN_URL);
                              die;
                         }
                         header("localtion:" . ROOT_URL);
                         die;
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
          header("localtion:" . ROOT_URL . '?ctl=login');
          die;
     }
}