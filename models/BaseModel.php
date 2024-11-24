<?php 
    //Class BaseModel chứa thôgn tin kết nối
    class BaseModel 
    {
        //Biến conn lưu trữ thông tin kết nối
        public $conn = null;

        //Ham khởi tạo
        public function __construct()
        {
            try{
                $this->conn = new PDO("mysql:host=" . HOST ."; dbname=" . DBNAME . ";charset=utf8; port=" . PORT, USERNAME, PASSWORD);
            }catch(PDOException $e){
                echo "Loi ket noi co so du lieu" . $e->getMessage();
            }
        }
    }
?>