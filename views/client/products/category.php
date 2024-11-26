<?php include_once ROOT_DIR . "views/client/header.php" ?>

<div class="mb-5">
    <a href="<?= ROOT_URL ?>">Trang chủ</a> >>
    <b><?= $title ?></b>
</div>
<h1>Sản phẩm</h1>
<?php foreach ($products as $product) : ?>
    <div class="product-grid">
        <div class="product-grids">
            <div class="product-card">
                <img src="<?= $product['Image'] ?>" alt="Product Image">
                <h4 class="product-name"><?= $product['ProductName'] ?></h4>
                <h4 class="product-price">
                    <?= $product['Price'] ?> VND
                </h4>
                <button class="add-to-cart">THÊM VÀO GIỎ</button>
                <a href="<?= ROOT_URL . '?ctl=detail&id=' . $product['id']?>">
                    <button class="view-details">XEM THÊM</button>
                </a>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?php include_once ROOT_DIR . "views/client/footer.php" ?>