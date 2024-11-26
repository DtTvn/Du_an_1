<?php
session_start();
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/common/function.php";
require_once __DIR__ . "/models/BaseModel.php";
require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Product.php";

require_once __DIR__ . "/controllers/HomeController.php";
require_once __DIR__ . "/controllers/ProductController.php";
require_once __DIR__ . "/controllers/SearchController.php";
require_once __DIR__ . "/controllers/CartController.php";

$ctl = $_GET['ctl'] ?? '';
match ($ctl) {
<<<<<<< HEAD
     // 'home' => (new HomeController)->index(),
     // 'category' => (new ProductController)->list(),
     // 'search' => (new SearchController)->search(),
     // 'detail' => (new ProductController)->show(),
     'view-cart' => (new CartController)->viewCart(),
     default => view("errors.404"),
=======
    '', 'home' => (new HomeController)->index(),
    'category' => (new ProductController)->list(),
    'search' => (new SearchController)->search(),
    'detail' => (new ProductController)->show(),
    default => view("errors.404"),
>>>>>>> 1d98b6aaf2e89b231d8891359de38fef16f524ee
};
