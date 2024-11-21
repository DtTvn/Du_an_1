<?php 
//AdminProductController Điều sản phẩm
    class AdminProductController {
        // Hàm index để hiển thị sản phẩm
        public function index() {
            $sanpham = (new Product()) -> all();
            return view("admin.products.list",compact('sanpham'));
        }

        // Hàm create hiển thị form thêm mới
        public function create(){
            $danhmucsanpham = (new Category) -> all();
            $title = "Thêm sản phẩm"; 
            return view("admin.products.add", compact('danhmucsanpham','title'));
        }
        // Hàm store dùng để lưu dữ liệu thêm vào database 
        public function store(){
            $data = $_POST;
    
            $image = ""; //Khi người dùng không upload ảnh
            //Nếu người dùng upload hình ảnh
            $file = $_FILES['image'];
            if ($file['size'] > 0) {
                //lấy ảnh
                $image = "images/" . $file['name'];
                //Upload ảnh
                move_uploaded_file($file['tmp_name'], ROOT_DIR . $image);
            }
            //đưa ảnh vào $data
            $data['image'] = $image;
            $product = new Product;
            $product->create($data);
            header("location: " . ADMIN_URL . "?ctl=listsp");
        }
        //Hàm edit dùng để hiển thị form cập nhật
        public function edit()    {
            $id = $_GET['ProductID'];
            $product = (new Product)->find($id);
            $categories = (new Category)->all();
            $title = "Cập nhật sản phẩm: " . $sanpham['ProductName'];
            return view(
                "admin.products.edit",
                compact('sanoham', 'categories', 'title')
            );
        }
    }
?>