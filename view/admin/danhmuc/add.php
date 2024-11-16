<div class="row 2">
    <div class="row 2 font_title">
        <h1>THÊM SẢN PHẨM MỚI</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Danh muc</label>
                <select name="iddm" id="">
                    <?php 
                        foreach($listdanhmuc as $dm){
                            extract($dm);
                        }
                    ?>
                </select>
            </div>
        </form>
    </div>
</div>