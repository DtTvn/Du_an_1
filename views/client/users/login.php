<link rel="stylesheet" href="css/login.css">
<div class="all-container">
    <div class="box-login">
        <h2>Sign in</h2>
        <form action="<?= ROOT_URL . '?ctl=login' ?>" method="POST">
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
            <div class="noti">Or use your email account.</div>
            <div class="box-input">
                <div class="box-user">
                    <i class="fa-solid fa-envelope"></i>
                    <input class="user" name="Email" type="Email" placeholder="Email">
                </div>
                <div class="box-user">
                    <i class="fa-solid fa-lock"></i>
                    <input class="user" name="Password" type="Password" placeholder="Password">
                </div>
            </div>
            <div class="button-login">
                <button type="submit">Đăng nhập</button>
            </div>
            <div class="box-forgot-password">
                <div class="box-login-btn-left">
                    <a href="<?= ROOT_URL . '?ctl=register' ?>">Đăng ký</a>
                </div>
                <div class="box-login-btn-right">
                    <a href="<?= ROOT_URL ?>">Trang chủ</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Hình nền dưới phần đăng nhập -->
    <div class="background-image"></div>
</div>
