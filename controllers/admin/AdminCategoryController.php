<?php 
    class AdminCategoryController{
        public function index(){
            $categories  = (new Category) -> all();
            return view('admin.categories.list',compact('categories'));
        }
    }
?>