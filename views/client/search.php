<?php include_once ROOT_DIR . "views/client/header.php"; ?>
    <div>
        Bạn muốn tìm kiếm: <?= $keyword?>
    </div>
    <?php if($tables) : ?>
    <div class="product-grid">
        <?php foreach ($tables as $table): ?>
            <div class="product-grids">
                <div class="product-card">
                    <img src="<?=$table['Image'] ?>" alt="Product Image">
                    <h4 class="product-name"><?= $table['ProductName'] ?></h4>
                    <h4 class="product-price">
                        <?= number_format($table['Price']) ?> vnđ
                    </h4>
                    <button class="add-to-cart">THÊM VÀO GIỎ</button>
                    <button class="view-details">XEM THÊM</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php else :?>
        <div>
            Rất tiếc sản phẩm mà bạn cần tìm không thấy
        </div>
    <?php endif ?>

<?php include_once ROOT_DIR . "views/client/footer.php"; ?>
