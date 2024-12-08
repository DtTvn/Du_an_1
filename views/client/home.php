<?php include_once ROOT_DIR . "views/client/header.php"; ?>
<?php include_once ROOT_DIR . "views/client/banner.php"; ?>
<div class="container">
    <h1>Sản phẩm mới</h1>
    <div class="product-grid">
        <?php
        // Xáo trộn sản phẩm
        shuffle($tables);
        foreach ($tables as $table): ?>
            <div class="product-card">
                <img src="<?= $table['Image'] ?>" alt="Product Image">
                <h4 class="product-name"><?= $table['ProductName'] ?></h4>
                <h4 class="product-price">
                    <?= number_format($table['Price']) ?> đ
                </h4>
                <!-- Nút thêm vào giỏ hàng -->
                <button class="add-to-cart"
                    data-id="<?= $table['id'] ?>"
                    onclick="addToCart(<?= $table['id'] ?>)">
                    THÊM VÀO GIỎ
                </button>
                <a href="<?= ROOT_URL . '?ctl=detail&id=' . $table['id'] ?>">
                    <button class="view-details">XEM THÊM</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php"; ?>
<script>
function addToCart(productId) {
    fetch('<?= ROOT_URL ?>?ctl=add-cart&id=' + productId, {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            alert("Sản phẩm đã được thêm vào giỏ hàng!");
        } else {
            alert("Sản phẩm đã được thêm vào giỏ hàng!");
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
