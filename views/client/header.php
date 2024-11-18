<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
                <h4>Giảm giá đặc biệt</h4>
            </div>
            <div class="cart">
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-regular fa-user"></i>
            </div>
        </div>
        <div class="header-middle">
            <img src="images/imgda1/logo.jpg" alt="Logo" class="logo">
            <ul class="nav-links">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $cate): ?>
                            <li><a class="dropdown-item" href="<?= ROOT_URL . '?ctl=category&id=' . $cate['CategoryID'] ?>">
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
            <div class="search">
                <button class="button">Tìm kiếm sản phẩm<i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </header>

    <div class="banner">
        <img src="images/imgda1/banner.jpg" alt="Banner">
    </div>

    <div class="product-list">
        <div class="product-item-wrapper1">
            <div class="product-item1">
                <img src="images/imgda1/img2.1.jpg" alt="SOFA">
                <h3>SOFA</h3>
            </div>
        </div>
        <div class="product-item-wrapper">
            <div>
                <div class="product-item">
                    <img src="images/imgda1/img2.2.jpg" alt="BÀN ĂN">
                    <h3>BÀN ĂN</h3>
                </div>
                <div class="product-item">
                    <img src="images/imgda1/img2.3.jpg" alt="GIƯỜNG">
                    <h3>GIƯỜNG</h3>
                </div>
            </div>
            <div>
                <div class="product-item">
                    <img src="images/imgda1/img2.4.jpg" alt="ARMCHAIR">
                    <h3>ARMCHAIR</h3>
                </div>
                <div class="product-item">
                    <img src="images/imgda1/img2.5.jpg" alt="GHẾ ĂN">
                    <h3>GHẾ ĂN</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="room-section">
            <div class="image-container">
                <img src="images/imgda1/img3.1.jpg" alt>
            </div>
            <div class="text-container">
                <div class="text-container-content">
                    <h3>Không gian phòng khách</h3>
                    <h5>Phòng khách là không gian chính của ngôi <br> nhà,
                        là nơi sum họp gia đình</h5>
                    <h4>Mẫu thiết kế -></h4>
                </div>
                <img src="images/imgda1/img3.2.jpg" alt>
            </div>
        </div>
        <div class="room-section">
            <div class="text-container">
                <img src="images/imgda1/img3.3.jpg" alt>
                <div class="text-container-content">
                    <h3>Không gian phòng khách</h3>
                    <h5>Phòng khách là không gian chính của ngôi <br> nhà,
                        là nơi sum họp gia đình</h5>
                    <h4>Mẫu thiết kế -></h4>
                </div>
            </div>
            <div class="image-container">
                <img src="images/imgda1/img3.4.jpg" alt>
            </div>
        </div>
    </div>