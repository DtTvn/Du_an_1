<?php
//AdminProductController Điều sản phẩm
class AdminProductController
{
    // Hàm index để hiển thị sản phẩm
    public function index()
    {
        $sanpham = (new Product())->all();
        return view("admin.products.list", compact('sanpham'));
    }

    // Hàm create hiển thị form thêm mới
    public function create()
    {
        $danhmucsanpham = (new Category)->all();
        $title = "Thêm sản phẩm";
        return view("admin.products.add", compact('danhmucsanpham', 'title'));
    }
    // Hàm store dùng để lưu dữ liệu thêm vào database 
    public function store()
    {
        $data = $_POST;

        $image = ""; //Khi người dùng không upload ảnh
        //Nếu người dùng upload hình ảnh
        $file = $_FILES['Image'];
        if ($file['size'] > 0) {
            //lấy ảnh
            $image = "Images/" . $file['name'];
            //Upload ảnh
            move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
        }
        //đưa ảnh vào $data
        $data['Image'] = $image;
        $product = new Product;
        $product->create($data);
        header("location: " . ADMIN_URL . "?ctl=listsp");
    }
    //Hàm edit dùng để hiển thị form cập nhật
    public function edit()
    {
        $id = $_GET['ProductID'];
        $sanpham = (new Product)->find($id);
        $danhmucsanpham = (new Category)->all();
        $title = "Cập nhật sản phẩm: " . $sanpham['ProductName'];
        return view(
            "admin.products.edit",
            compact('sanpham', 'CategoryID', 'title')
        );
    }
    public function update()
    {
        $data = $_POST;

        //Lấy sản phẩm hiện tại
        $product = new Product;
        $item = $product->find($data['id']);
        $image = $item['Image']; //Khi người dùng không upload ảnh
        //Nếu người dùng upload hình ảnh
        $file = $_FILES['Image'];
        if ($file['size'] > 0) {
            //lấy ảnh
            $image = "images/" . $file['name'];
            //Upload ảnh
            move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
        }
        //đưa ảnh vào $data
        $data['image'] = $image;

        $product->update($data['id'], $data);

        header("location: " . ADMIN_URL . "?ctl=editsp&id=" . $data['id']);
        die;
    }
}