<footer class="footer">
    <div class="footer1">
        <div class="footer-connect">
            <h3>KẾT NỐI VỚI HOMENEST</h3>
            <a href="<?= ROOT_URL?>">
                <img src="images/logo.jpg" alt="Logo" class="logo">
            </a>
            <h4>FOLLOW US</h4>
            <h5>Instagram-Youtube-Facebook</h5>
            <button class="button">HỆ THỐNG CỬA HÀNG</button>
        </div>
        <div class="footer-about">
            <h3>HOMENEST</h3>
            <h5>Giới thiệu</h5>
            <h5>Chuyện homenest</h5>
            <h5>Tổng công ty</h5>
            <h5>Tuyển dụng</h5>
            <h5>Đổi trả hàng</h5>
        </div>
        <div class="footer-inspiration">
            <h3>CẢM HỨNG #HOMENEST</h3>
            <h5>Sản phẩm</h5>
            <h5>Ý tưởng và cảm hứng</h5>
        </div>
        <div class="footer-newsletter">
            <h3>NEWSLETTER</h3>
            <h5>Hãy để lại email của bạn để nhận được <br> những ý tưởng
                trang
                trí mới và những <br> thông tin, ưu đãi từ Nhà Xinh</h5>
            <h5>Email: homenet@gmail.com</h5>
            <h5>Hotline: 0111111111</h5>
        </div>
    </div>
    <div class="footer2">
        <h5>© 2021 - Bản quyền của HOMENEST - thương hiệu thuộc AKA
            Furniture
            <br>Từ năm 1999 - thương hiệu đăng ký số 284074 Cục sở hữu
            trí
            tuệ
        </h5>
    </div>
    
</footer>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    //lấy button
    search = document.getElementById('search');
    keyword = document.getElementById('keyword')
    //viết sự kiện click cho nút search
    search.addEventListener('click', function() {
        searchProduct();
    })
    keyword.addEventListener('keydown', function(e) {
        //Kiểm tra nếu phím người dùng nhấn là phím Enter
        if (e.key == 'Enter') {
            searchProduct();
            e.preventDefault()
        }
    })
    //hàm seach()
    function searchProduct() {
        window.location = "<?= ROOT_URL ?>" + "?ctl=search&keyword=" + keyword.value;
    }
</script>
</body>
</html>