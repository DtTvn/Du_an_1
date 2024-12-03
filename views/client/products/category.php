<?php include_once ROOT_DIR . "views/client/header.php" ?>
<!-- bộ lọc -->
<form method="GET" action="<?= ROOT_URL ?>">
    <input type="hidden" name="ctl" value="search">
    <div class="input-group">
        <input
            type="text"
            class="form-control"
            name="keyword"
            placeholder="Tìm kiếm sản phẩm"
            value="<?= htmlspecialchars($keyword ?? '') ?>">
        <input
            type="number"
            class="form-control"
            name="minPrice"
            placeholder="Giá thấp nhất"
            value="<?= htmlspecialchars($minPrice ?? '') ?>">
        <input
            type="number"
            class="form-control"
            name="maxPrice"
            placeholder="Giá cao nhất"
            value="<?= htmlspecialchars($maxPrice ?? '') ?>">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </div>
</form>
<h1>Sản phẩm <?= $title ?></h1>
<div class="product-grid">
    <?php foreach ($products as $product) : ?>
        <div class="product-grids">
            <div class="product-card">
                <img src="<?= $product['Image'] ?>" alt="Product Image">
                <h4 class="product-name"><?= $product['ProductName'] ?></h4>
                <h4 class="product-price">
                    <?= number_format($product['Price']) ?> VND
                </h4>
                <button class="add-to-cart">THÊM VÀO GIỎ</button>
                <a href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id'] ?>">
                    <button class="view-details">XEM THÊM</button>
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php include_once ROOT_DIR . "views/client/footer.php" ?>