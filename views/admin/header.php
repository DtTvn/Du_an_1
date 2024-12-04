<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - <?= $title ?? '' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href=""><img src="../images/logo.jpg" alt="" width="120px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= ADMIN_URL ?>">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listsp' ?>">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listdm' ?>">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=listuser' ?>">Tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ADMIN_URL . '?ctl=list-order' ?>">Đơn hàng</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <div class="dropdown">
                            <a class="fa-regular fa-user fs-5 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['user']['FullName'] ?? '' ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <li><a class="dropdown-item" href="<?= ROOT_URL ?>">Trang chu</a></li>
                                    <li><a class="dropdown-item" href="?ctl=logout">Đăng xuất</a></li>
                                <?php else : ?>
                                    <li><a class="dropdown-item" href="<?= ROOT_URL . "?ctl=login" ?>">Đăng nhập</a></li>
                                    <li><a class="dropdown-item" href="<?= ROOT_URL . "?ctl=register" ?>">Đăng ký</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </nav>