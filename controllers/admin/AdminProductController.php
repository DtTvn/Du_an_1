<?php
  class AdminProductController{
    public function index(){
      $products = (new Product)->all();
      return view('admin.products.list', compact('products'));
    }

    //Form thêm
    public function add(){
      $products = (new Product())->all();
      return view('admin.products.add',compact('products'));
    }
    //sửa
    public function edit(){}
    //lấy dữ liệu từ csdl
    public function store(){
      $data = $_POST;
      //Nếu người dùng không cập nhật ảnh
      $image = '';
      //nếu người dùng nhập ảnh
      $file = $_FILES['Image'];
      if($file['size'] > 0){
        $image = 'images/' . $file['name'];
        move_uploaded_file($file['tmp_name'],ROOT_DIR . $image);
      }
      //dua anh vaof mangr
      $data['Image'] = $image;
      // // luu anh vao csdl
      dd($data);
      (new Product)->create($data);
      header('location:'. ADMIN_URL . "?ctl=listsp");
      die;
    }
    //cập nhật
    public function update(){}
    //xóa
    public function delete(){}
  }