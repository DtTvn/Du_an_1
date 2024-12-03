<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <header class="header">
        <div class="header-top">
            <h4 class="phone">
                <i class="fa-solid fa-phone"></i>
                0123 456 789
            </h4>
            <div class="menu">
                <h4>Giới thiệu</h4>
                <h4>Khuyến mãi</h4>
                <h4 class="sales">Giảm giá đặc biệt</h4>
            </div>
            <div class="cart">
                <!-- giỏ hàng -->
                <a class="nav-link" href="<?= ROOT_URL . '?ctl=view-cart' ?>">
                    <i class="fa-solid fa-cart-shopping">(<?= $_SESSION['totalQuantity'] ?? 0 ?>)</i>
                </a>
                <i>
                    <a class="fa-regular fa-user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['user']['FullName'] ?? '' ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <li>
                                <a class="dropdown-item" href="<?= ROOT_URL ?>">
                                    Xem thong tin
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="?ctl=logout">
                                    dang xuat
                                </a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a class="dropdown-item" href="<?= ROOT_URL . "?ctl=login" ?>">
                                    Đăng nhập
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= ROOT_URL . "?ctl=register " ?>">
                                    đăng kí
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </i>
            </div>
        </div>
        <div class="header-middle">
            <a href="<?= ROOT_URL ?>">
                <img src="images/logo.jpg" alt="Logo" class="logo">
            </a>
            <ul class="nav-links ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $cate) : ?>
                            <li><a class="dropdown-item" href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                                    <?= $cate['CategoryName'] ?>
                                </a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li><a href="#">Phòng</a></li>
                <li><a href="#">Bộ sưu tập</a></li>
                <li><a href="#">Thiết kế nội thất</a></li>
                <li><a href="#">Cửa hàng 360 độ</a></li>
                <li><a href="#">Góc cảm hứng</a></li>
            </ul>
            <form class="d-flex align-items-center" role="search">
                <div class="input-group">
                    <input
                        class="form-control"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                        id="keyword">
                    <button
                        class="btn"
                        type="button"
                        id="search"
                        style="background-color: #000000; color: white;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </header>