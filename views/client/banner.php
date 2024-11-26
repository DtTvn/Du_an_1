<div class="banner">
    <img id="banner-image" src="images/banner1.jpg" alt="Banner Image">
    <button class="left" id="left"><i class="fa-solid fa-arrow-left"></i></button>
    <button class="right" id="right"><i class="fa-solid fa-arrow-right"></i></button>
</div>
<script>
    let images = ['images/banner1.jpg', 'images/banner2.jpg', 'images/banner3.jpg'];
    let currentIndex = 0;

    function changeBanner() {
        document.getElementById('banner-image').src = images[currentIndex];
    }

    function nextBanner() {
        currentIndex = (currentIndex + 1) % images.length;
        changeBanner();
    }

    function prevBanner() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        changeBanner();
    }

    document.getElementById('left').addEventListener('click', prevBanner);
    document.getElementById('right').addEventListener('click', nextBanner);

    // Optional: change image every 3 seconds automatically
    setInterval(nextBanner, 3000);
</script>

<div class="product-list">
    <div class="product-item-wrapper1">
        <div class="product-item1">
            <img src="images/img2.1.jpg" alt="SOFA">
            <a href="">
                <h3>SOFA</h3>
            </a>
        </div>
    </div>
    <div class="product-item-wrapper">
        <div>
            <div class="product-item">
                <img src="images/img2.2.jpg" alt="BÀN ĂN">
                <a href="">
                    <h3>BÀN ĂN</h3>
                </a>
            </div>
            <div class="product-item">
                <img src="images/img2.3.jpg" alt="GIƯỜNG">
                <a href="">
                    <h3>GIƯỜNG</h3>
                </a>
            </div>
        </div>
        <div>
            <div class="product-item">
                <img src="images/img2.4.jpg" alt="ARMCHAIR">
                <a href="">
                    <h3>ARMCHAIR</h3>
                </a>
            </div>
            <div class="product-item">
                <img src="images/img2.5.jpg" alt="GHẾ ĂN">
                <a href="">
                    <h3>GHẾ ĂN</h3>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="room-section">
        <div class="image-container">
            <img src="images/img3.1.jpg" alt>
        </div>
        <div class="text-container">
            <div class="text-container-content">
                <h3>Không gian phòng khách</h3>
                <h5>Phòng khách là không gian chính của ngôi <br> nhà,
                    là nơi sum họp gia đình</h5>
                <h4>Mẫu thiết kế -></h4>
            </div>
            <img src="images/img3.2.jpg" alt>
        </div>
    </div>
    <div class="room-section">
        <div class="text-container">
            <img src="images/img3.3.jpg" alt>
            <div class="text-container-content">
                <h3>Không gian phòng khách</h3>
                <h5>Phòng khách là không gian chính của ngôi <br> nhà,
                    là nơi sum họp gia đình</h5>
                <h4>Mẫu thiết kế -></h4>
            </div>
        </div>
        <div class="image-container">
            <img src="images/img3.4.jpg" alt>
        </div>
    </div>
</div>