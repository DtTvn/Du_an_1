<?php
session_start();
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/common/function.php";
require_once __DIR__ . "/models/BaseModel.php";
require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Product.php";
require_once __DIR__ . "/models/User.php";

require_once __DIR__ . "/controllers/HomeController.php";
require_once __DIR__ . "/controllers/ProductController.php";
require_once __DIR__ . "/controllers/SearchController.php";
require_once __DIR__ . "/controllers/CartController.php";
require_once __DIR__ . "/controllers/AuthController.php";

$ctl = $_GET['ctl'] ?? '';
match ($ctl) {
    '', 'home' => (new HomeController)->index(),
    'category' => (new ProductController)->list(),
    'search' => (new SearchController)->search(),
    'detail' => (new ProductController)->show(),
    'register'=> (new AuthController)->register(),
    'login' =>(new AuthController)->login(),
    'logout' => (new AuthController)->logout(),
    // 'view-cart' => (new CartController)->viewCart(),
    default => view("errors.404"),
};
