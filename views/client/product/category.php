<?php include_once ROOT_DIR . "views/client/header.php" ?>
<? foreach ($tables as $table) : ?>
    <h1>Sản phẩm mới</h1>
    <div class="product-grid">
        <div class="product-grids">
            <div class="product-card">
                <img src="<?= $table['Image']?>" alt="Product Image">
                <h4 class="product-name"><?= $table['ProductName'] ?></h4>
                <h4 class="product-price">
                    <?= $table['Price']?> vnđ
                </h4>
                <button class="add-to-cart">THÊM VÀO GIỎ</button>
                <button class="view-details">XEM THÊM</button>
            </div>
        </div>
    </div>
    <?php var_dump($tables); ?>
<?php endforeach;?>
    <?php include_once ROOT_DIR . "views/client/footer.php" ?>