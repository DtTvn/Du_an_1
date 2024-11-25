<?php
class AdminProductController
{
  public function index()
  {
    $products = (new Product)->all();
    //Lây thông báo từ session
    $message = session_flash('message');
    $type = session_flash('type');

    return view('admin.products.list', compact('products','message', "type"));
  }

  //Form thêm
  public function add()
  {
    $Categories = (new Category)->all();
    return view('admin.products.add', compact('Categories'));
  }
  //sửa
  public function edit()
  {
    $id = $_GET['id'];
    $products = (new Product)->find($id);
    $Categories = (new Category)->all();
    view('admin.products.edit', compact('products', 'Categories'));
  }
  //lấy dữ liệu từ csdl
  public function store()
  {
    $data = $_POST;
    //Nếu người dùng không cập nhật ảnh
    $image = '';
    //nếu người dùng nhập ảnh
    $file = $_FILES['Image'];
    if ($file['size'] > 0) {
      $image = 'images/' . $file['name'];
      move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
    }
    //dua anh vaof mangr
    $data['Image'] = $image;
    // // luu anh vao csdl
    dd($data);
    (new Product)->create($data);
    header('location:' . ADMIN_URL . "?ctl=listsp");
    die;
  }
  //cập nhật
  public function update()
  {
    $data = $_POST;
    //Nếu người dùng không cập nhật ảnh
    $image = '';
    //nếu người dùng nhập ảnh
    $file = $_FILES['Image'];
    if ($file['size'] > 0) {
      $image = 'images/' . $file['name'];
      move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
    }
    //dua anh vaof mangr
    $data['Image'] = $image;
    // // luu anh vao csdl
    dd($data);
    (new Product)->update($data['id'], $data);
    header("location:" . ADMIN_URL . "?ctl=listsp&id=" . $data['id']);
    die;
  }
  //xóa
  public function delete()
  {
    $id = $_GET['id'];
    (new Product)->delete($id);
    header("location:" . ADMIN_URL . "?ctl=listsp");
  }
}
