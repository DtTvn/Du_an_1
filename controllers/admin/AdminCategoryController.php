<?php 
    class AdminCategoryController{
        public function index(){
            $categories  = (new Category)->all();
            //Lây thông báo từ session
            $message =session_flash('message');

            return view('admin.categories.list',compact('categories', 'message'));
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
            $_SESSION['message'] = "Thêm dữ liệu thanh công";
            //chuyển hướng về danh sách
            header("Location: ?ctl=listdm");
       }

        //Hien thi form edit
        public function edit(){
            $id = $_GET['id'];
            $category =(new Category)->find($id);
            //Lay session thong bao
            $message = session_flash('message');
            return view('admin.categories.edit',compact('category', 'message'));
        }
        //Update
        public function update() {
            $data = $_POST;
            (new Category)->update($data['id'], $data);
            $_SESSION['message'] = "Cap nhap du lieu thanh cong";
            header("location: " . ADMIN_URL . '?ctl=editdm&id=' .$data['id']);
        }

        //Xoa 
        public function delete(){
            $id = $_GET['id'];
            // Kiem tra xem du lieu cua products thuoc category khong
            $products = (new Product)->listProductInCategory($id);
            if($products){
                $_SESSION['message']="Khong the xoa vi co san pham cua danh muc";
                header("Location:" . ADMIN_URL . "?ctl=listdm");
                return;
            }

            //Xoa
            (new Category)->delete($id);
            $_SESSION['message']= "Xoa du lieu thanh cong";
            header("location: " . ADMIN_URL . "?ctl=listdm");
            return;
        }
    }
?>