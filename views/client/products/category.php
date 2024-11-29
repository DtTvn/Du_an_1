<?php include_once ROOT_DIR . "views/client/header.php" ?>

<h1>Sản phẩm <?= $title ?></h1>
<div class="product-grid">
    <?php foreach ($products as $product) : ?>
        <div class="product-grids">
            <div class="product-card">
                <img src="<?= $product['Image'] ?>" alt="Product Image">
                <h4 class="product-name"><?= $product['ProductName'] ?></h4>
                <h4 class="product-price">
                    <?= $product['Price'] ?> VND
                </h4>
                <!-- Nút thêm vào giỏ hàng -->
                <button class="add-to-cart"
                    data-id="<?= $product['id'] ?>"
                    onclick="addToCart(<?= $product['id'] ?>)">
                    THÊM VÀO GIỎ
                </button>
                <a href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id'] ?>">
                    <button class="view-details">XEM THÊM</button>
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php include_once ROOT_DIR . "views/client/footer.php" ?>
<script>
    function addToCart(productId) {
        fetch('<?= ROOT_URL ?>?ctl=add-cart&id=' + productId, {
                method: 'GET'
            })
            .then(response => {
                if (response.ok) {
                    alert("Sản phẩm đã được thêm vào giỏ hàng!");
                } else {
                    alert("Đã xảy ra lỗi, vui lòng thử lại.");
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>