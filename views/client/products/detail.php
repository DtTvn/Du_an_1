<?php include_once ROOT_DIR . "/views/client/header.php" ?>

<div class="container mt-5">
    <div class="row">
        <!-- Hình ảnh sản phẩm -->
        <div class="col-md-6">
            <img src="<?= $product['Image'] ?>" alt="Tên sản phẩm" class="img-fluid rounded">
        </div>
        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="display-5"><?= $product['ProductName'] ?></h1>
            <p class="text-muted"><?= number_format($product['Price']) ?> VND</p>
            <p><strong>Dimensions</strong>
                <button class="btn-lg border border-dark text-dark">
                    <i class="bi bi-cart-plus"></i><?= $product['Dimensions'] ?>
                </button>
            </p>
            <p><strong>Material</strong>
                <button class="btn-lg border border-dark text-dark">
                    <i class="bi bi-cart-plus"></i><?= $product['Material'] ?>
                </button>
            </p>
            <p><strong>Color</strong>
                <button class="btn-lg border border-dark text-dark">
                    <i class="bi bi-cart-plus"></i><?= $product['Color'] ?>
                </button>
            </p>

            <!-- Nút thêm vào giỏ hàng -->
            <div class="mt-4">
                <button class="btn btn-light btn-lg border border-dark text-dark">
                    <i class="bi bi-cart-plus"></i> Mua ngay
                </button>
                <button class="btn btn-light btn-lg border border-dark text-dark">
                    <a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>" style="text-decoration: none; color:black;">
                        Thêm vào giỏ hàng
                    </a>
                </button>
            </div>
            <!-- Thêm phần mô tả chi tiết nếu cần -->
            <hr>
            <div class="row mt-5">
                <div class="col">
                    <h2>Mô tả sản phẩm</h2>
                    <p><?= $product['Description'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>
<!-- Bootstrap JS -->
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>