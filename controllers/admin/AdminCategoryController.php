<?php
     class AdminCategoryController{
          public function index(){
               $Categories = (new Category()) ->all();
               $message = $this->session_flash('message');
               return view('admin.Categories.list', compact('Categories', 'message'));
          }
          public function create(){
               return view('admin.Categories.add');
          }
          public function store(){
               $data = $_POST;
               (new Category ) -> create($data);
               //Lưu thông báo về session
               $_SESSION['message'] = "Thêm dữ liệu thanhf công";
               //chuyển hướng về danh sách
               header("Location: ?ctl=listdm");
          }
          //Hàm dd dùng để debug
          public function dd($data){
               echo "<pre>";
               var_dump($data);
               echo "</pre>";
          }
          //Hàm sử dụng session thông báo message nhanh
          public function session_flash($key) {
               $message = $_SESSION[$key] ?? '';
               unset($_SESSION[$key]);
               return $message;
          }
          //Hiện thị form update của danh mục
          public function edit(){
               $CategoryID = $_GET['CategoryID'];
               $Category = (new Category)->find($CategoryID);
               return view('admin.Categories.edit', compact('Category'));
          }

          //update 
          public function update(){
               $data = $_POST;
               (new Category())->update($data['CategoryID'],$data);
               $_SESSION['message'] = 'Cập Nhật Thành Công';
               header("location: ?ctl=editdm&id=" .$data['CategoryID']);
          }
     }