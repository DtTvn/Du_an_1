<link rel="stylesheet" href="css/singup.css">
<div class="all-container">
     <div class="box-login">
          <h2>Đăng ký</h2>
          <div class="box-login-icon">
               <a href="">
                    <i class="fa-brands fa-facebook"></i>
               </a>
               <a href="">
                    <i class="fa-brands fa-google"></i>
               </a>
               <a href="">
                    <i class="fa-brands fa-instagram"></i>
               </a>
          </div>
          <div class="noti">Điền đầy đủ Thông Tin vào cho tao</div>
          <form action="<?= ROOT_URL . '?ctl=register' ?>" method="POST">
               <div class="box-input">
                    <div class="box-user">
                         <i class="fa-solid fa-user"></i>
                         <input class="user" type="text" name="FullName" placeholder="Nhập họ tên">
                    </div>
                    <div class="box-user">
                         <i class="fa-solid fa-envelope"></i>
                         <input class="user" type="email" name="Email" placeholder="Nhập email">
                    </div>
                    <div class="box-user">
                         <i class="fa-solid fa-lock"></i>
                         <input class="user" type="password" name="Password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="box-user">
                         <i class="fa-solid fa-phone"></i>
                         <input class="user" type="text" name="Phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="box-user">
                         <i class="fa-solid fa-location-dot"></i>
                         <input class="user" type="text" name="address" placeholder="Nhập địa chỉ">
                    </div>
               </div>
               <div class="button-login">
                    <a href=""><button type="submit">Đăng ký</button></a> 
               </div>
               
               <div class="box-forgot-password">
                    <div>
                         <a href="">Forgot your password ?</a>
                    </div>
               </div>
          </form>
     </div>
</div>