<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?= $title ?? '' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: row;
            height: 100%;
            margin: 0;
        }

        .sidebar {
            width: 250px; /* Cố định chiều rộng của sidebar */
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: fixed; /* Giữ sidebar cố định khi cuộn */
            top: 0;
            left: 0;
            bottom: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: color 0.3s, background-color 0.3s;
            padding: 8px 15px;
            display: block;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            margin-left: 250px; /* Đảm bảo rằng nội dung không bị che khuất bởi sidebar */
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .gallery img {
            width: 100%;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar .btn {
            width: 100%;
        }

        .mt-auto {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a class="navbar-brand mb-3 d-block" href=""><img src="../images/logo.jpg" alt="" width="120px"></a>
        <ul>
            <li><a href="<?= ADMIN_URL ?>">Trang chủ</a></li>
            <li><a href="<?= ADMIN_URL . '?ctl=listsp' ?>">Sản phẩm</a></li>
            <li><a href="<?= ADMIN_URL . '?ctl=listdm' ?>">Danh mục</a></li>
            <li><a href="<?= ADMIN_URL . '?ctl=listuser' ?>">Tài khoản</a></li>
            <li><a href="<?= ADMIN_URL . '?ctl=list-order' ?>">Đơn hàng</a></li>
            <li><a href="<?= ADMIN_URL . '?ctl=product-comment' ?>">Bình luận</a></li>
        </ul>
        <div class="mt-auto">
            <a class="btn btn-secondary btn-sm mb-2" href="<?= ROOT_URL ?>">Trang chủ Client</a>
            <?php if (isset($_SESSION['user'])) : ?>
                <a class="btn btn-danger btn-sm" href="?ctl=logout">Đăng xuất</a>
            <?php else : ?>
                <a class="btn btn-primary btn-sm" href="<?= ROOT_URL . '?ctl=login' ?>">Đăng nhập</a>
            <?php endif ?>
        </div>
    </div>

    <div class="main-content">
        <!-- Nội dung của trang chủ hoặc phần khác sẽ nằm ở đây -->
    </div>
</body>

</html>
