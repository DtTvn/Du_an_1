<?php

class AuthController {
    // Đăng ký
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Mã hóa mật khẩu
            $data['Password'] = password_hash($_POST['Password'], PASSWORD_DEFAULT);

            // Thêm vào cơ sở dữ liệu
            (new User)->create($data);

            // Thông báo và chuyển hướng
            $_SESSION['message'] = 'Đăng ký thành công';
            header('location:' . ROOT_URL . "?ctl=login");
            exit();
        }
        return view('client.users.register');
    }

    // Đăng nhập
    public function login() {
        // Nếu đã đăng nhập, chuyển hướng
        if (isset($_SESSION['user'])) {
            header("location:" . ROOT_URL);
            exit();
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['Email']);
            $password = $_POST['Password'];

            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $user = (new User)->findUserOfEmail($email);

            // Kiểm tra thông tin đăng nhập
            if ($user && password_verify($password, $user['Password'])) {
                // Lưu thông tin vào session
                $_SESSION['user'] = $user;
                $_SESSION['user']['role'] = $user['role'];

                // Chuyển hướng dựa trên vai trò
                $redirectURL = ($user['role'] == 'admin') ? ADMIN_URL : ROOT_URL;
                header("location: " . $redirectURL);
                exit();
            } else {
                $error = "Email hoặc Mật khẩu không đúng!";
            }
        }

        // Hiển thị giao diện với thông báo lỗi (nếu có)
        $message = session_flash('message');
        return view('client.users.login', compact('message', 'error'));
    }

    // Đăng xuất
    public function logout() {
        session_destroy(); // Xóa toàn bộ session
        header("location:" . ROOT_URL . '?ctl=login');
        exit();
    }

    // Danh sách người dùng (dành cho admin)
    public function index() {
        if (!$this->isAdmin()) {
            header("location: " . ROOT_URL);
            exit();
        }

        $users = (new User)->all();
        return view('admin.users.list', compact('users'));
    }

    // Cập nhật trạng thái kích hoạt người dùng
    public function updateActive() {
        if (!$this->isAdmin()) {
            header("location: " . ROOT_URL);
            exit();
        }

        $data = $_POST;
        $data['active'] = $data['active'] ? 0 : 1;
        (new User)->updateActive($data['id'], $data['active']);

        header('location: ' . ADMIN_URL . '?ctl=listuser');
        exit();
    }

    // Kiểm tra người dùng có phải admin hay không
    private function isAdmin() {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin';
    }
}
