<?php
//Hàm render view
function view($path_view, $data=[]){
    extract($data);
    $path_view = str_replace(".", "/", $path_view);
    include_once ROOT_DIR . "views/$path_view.php";
}

//hàm dd dùng để debug lỗi
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
//Ham session_flash se huy session ngay lap tuc
function session_flash($key){
    $message = $_SESSION[$key] ?? '';
    unset($_SESSION[$key]);
    return $message;
}

// chuyển đổi trạng thái đơn hàng
function getOrderStatus($status){
    $status_details = [
        1 => 'Chờ xác nhận',
        2 => 'Chờ giao hàng',
        3 => 'Đã giao',
        4 => 'Đã hủy',
    ];
    return $status_details[$status];
}


?>