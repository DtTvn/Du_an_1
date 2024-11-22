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
<<<<<<< HEAD

=======
    require_once __DIR__ . "/../controllers/admin/AdminCategoryController.php";
>>>>>>> 8d6fd90706605db0c6c10ac666f66d8191d07cdb
    $ctl = $_GET['ctl'] ?? '';
    match ($ctl) {
        ''  => view("admin.dashboard"),
        'addsp' => (new AdminProductController) ->create(),
        'listsp' => (new AdminProductController) ->index(),
<<<<<<< HEAD
        'storre' => (new AdminProductController) ->store(),
        default => view("errors.404"),
    };
=======
        'storesp' => (new AdminProductController) ->store(),
        'listdm' => (new AdminCategoryController)->index(),
        'adddm' => (new AdminCategoryController)->create(),
        'storedm' => (new AdminCategoryController)->store(),
        'editdm' => (new AdminCategoryController)->edit(),
        'updatedm' => (new AdminCategoryController)->update(),
        default => view("errors.404"),
    };
>>>>>>> 8d6fd90706605db0c6c10ac666f66d8191d07cdb
