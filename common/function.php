<?php 

    //Hàm ender view
    function view($path_view,$data = []){
        extract($data);
        $path_view = str_replace(".", "/", $path_view);
        include_once ROOT_DIR . "view/$path_view.php";
    }
?>