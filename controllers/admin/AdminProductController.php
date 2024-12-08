<?php
class AdminProductController
{
  public function __construct()
  {
    $user = $_SESSION['user'] ?? [];
    if (!$user || $user['role'] != 'admin') {
      return header("location: " . ROOT_URL);
    }
  }

  // Hiển thị danh sách sản phẩm
  public function index()
  {
    $products = (new Product)->all();
    // Lấy thông báo từ session
    $message = session_flash('message');
    $type = session_flash('type');

    return view('admin.products.list', compact('products', 'message', 'type'));
  }

  // Form thêm sản phẩm
  public function add()
  {
    $Categories = (new Category)->all();
    return view('admin.products.add', compact('Categories'));
  }

  // Thêm sản phẩm
  public function store()
  {
    $data = $_POST;
    // Nếu người dùng không cập nhật ảnh
    $image = '';
    // Nếu người dùng nhập ảnh
    $file = $_FILES['Image'];
    if ($file['size'] > 0) {
      $image = 'images/' . $file['name'];
      move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
    }
    // Đưa ảnh vào mảng dữ liệu
    $data['Image'] = $image;

    // Lưu sản phẩm vào cơ sở dữ liệu
    (new Product)->create($data);

    // Lưu thông báo vào session
    $_SESSION['message'] = "Thêm sản phẩm thành công";
    $_SESSION['type'] = "success"; // Thông báo thành công

    // Chuyển hướng về trang danh sách sản phẩm
    header('location:' . ADMIN_URL . "?ctl=listsp");
    die;
  }

  // Hiển thị form sửa sản phẩm
  public function edit()
  {
    $id = $_GET['id'];
    $products = (new Product)->find($id);
    $Categories = (new Category)->all();
    view('admin.products.edit', compact('products', 'Categories'));
  }

// Cập nhật sản phẩm
public function update()
{
    $data = $_POST;
    // Kiểm tra xem người dùng có chọn ảnh mới không
    $image = '';

    // Nếu có ảnh mới được tải lên
    if ($_FILES['Image']['size'] > 0) {
        $image = 'images/' . $_FILES['Image']['name'];
        move_uploaded_file($_FILES['Image']['tmp_name'], ROOT_DIR . $image);
    } else {
        // Nếu không, giữ lại ảnh cũ
        $existingProduct = (new Product)->find($data['id']);
        $image = $existingProduct['Image']; // Giữ lại ảnh cũ
    }

    // Đưa ảnh vào mảng dữ liệu
    $data['Image'] = $image;

    // Cập nhật sản phẩm trong cơ sở dữ liệu
    (new Product)->update($data['id'], $data);

    // Lưu thông báo vào session
    $_SESSION['message'] = "Cập nhật sản phẩm thành công";
    $_SESSION['type'] = "success"; // Thông báo thành công

    // Chuyển hướng về trang danh sách sản phẩm sau khi sửa thành công
    header("location:" . ADMIN_URL . "?ctl=listsp");
    die;
}



  // Xóa sản phẩm
  public function delete()
  {
    $id = $_GET['id'];

    // Xóa sản phẩm khỏi cơ sở dữ liệu
    (new Product)->delete($id);

    // Lưu thông báo vào session
    $_SESSION['message'] = "Xóa sản phẩm thành công";
    $_SESSION['type'] = "success"; // Thông báo thành công

    // Chuyển hướng về trang danh sách sản phẩm
    header("location:" . ADMIN_URL . "?ctl=listsp");
    die;
  }
}
