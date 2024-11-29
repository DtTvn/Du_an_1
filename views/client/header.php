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
    <!-- Thêm jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header class="header">
        <div class="header-middle">
            <a href="<?= ROOT_URL ?>">
                <img src="images/logo.jpg" alt="Logo" class="logo">
            </a>
            <ul class="nav-links ">
                <li><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
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
                <li><a href='?ctl=camhung'>Góc Cảm Hứng</a></li>
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
                <a href="<?= ROOT_URL .'?ctl=view-cart'?>"><i class="fa-solid fa-cart-shopping m-3 fs-5">(<?= $_SESSION['totalQuantity'] ?? 0?>)</i></a>
                
                    <i>
                        <a class="fa-regular fa-user fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['user']['FullName'] ?? '' ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if(isset($_SESSION['user'])) : ?>
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
                                    <a class="dropdown-item" href="<?= ROOT_URL . "?ctl=register "?>">
                                        đăng kí
                                    </a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </i>
            </form>
        </div>
    </header>