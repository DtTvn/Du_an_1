<?php 
session_start();
    require_once __DIR__ . "/../env.php";
    require_once __DIR__ . "/../common/function.php";

    // include models
    require_once __DIR__ . "/../models/BaseModel.php";
    require_once __DIR__ . "/../models/Category.php";
    require_once __DIR__ . "/../models/Product.php";
    //include controller
    require_once __DIR__ . "/../controllers/admin/AdminProductController.php";
    require_once __DIR__ . "/../controllers/admin/AdminCategoryController.php";
    $ctl = $_GET['ctl'] ?? '';
    match ($ctl) {
        ''  => view("admin.dashboard"),
        'addsp' => (new AdminProductController) ->create(),
        'listsp' => (new AdminProductController) ->index(),
        'storesp' => (new AdminProductController) ->store(),
        'listdm' => (new AdminCategoryController)->index(),
        'adddm' => (new AdminCategoryController)->create(),
        'storedm' => (new AdminCategoryController)->store(),
        'updatedm' => (new AdminCategoryController)->update(),
        'deletedm' => (new AdminCategoryController)->delete(),
        default => view("errors.404"),
    };
