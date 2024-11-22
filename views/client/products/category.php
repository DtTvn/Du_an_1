<?php include_once ROOT_DIR . "views/client/header.php" ?>

<div class="mb-5">
    <a href="<?= ROOT_URL ?>">Trang chủ</a> >>
    <b><?= $title ?></b>
</div>
    <h1>Sản phẩm mới</h1>
<?php foreach ($products as $pro) : ?>
    <div class="product-grid">
        <div class="product-grids">
            <div class="product-card">
                <img src="<?= $pro['Image'] ?>" alt="Product Image">
                <h4 class="product-name"><?= $pro['ProductName'] ?></h4>
                <h4 class="product-price">
                    <?= $pro['Price'] ?> vnđ
                </h4>
                <button class="add-to-cart">THÊM VÀO GIỎ</button>
                <button class="view-details">XEM THÊM</button>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?php include_once ROOT_DIR . "views/client/footer.php" ?>  