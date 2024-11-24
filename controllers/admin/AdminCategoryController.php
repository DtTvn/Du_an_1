<?php 
    class AdminCategoryController{
        public function index(){
            $categories  = (new Category) -> all();
            //Lây thông báo từ session
            $message =$_SESSION['message'] ?? '';
            return view('admin.categories.list',compact('categories'));
        }

        //Form them danh muc
        public function create(){
            return view('admin.categories.add');
        }

        //Luu du lieu them vao csdl
        public function store(){
            $data = $_POST;
            (new Category) -> create($data);
            //Lưu thông báo về session
            $_SESSION['message'] = "Thêm dữ liệu thanhf công";
            //chuyển hướng về danh sách
            header("Location: ?ctl=listdm");
        }

        //Hien thi form edit
        public function edit(){
            $id = $_GET['id'];
            $category =(new Category)->find($id);
            return view('admin.categories.edit',compact('category'));
        }

        //Update
        public function update() {
            
        }
    }
?>
