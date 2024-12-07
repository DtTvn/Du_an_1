<?php include_once ROOT_DIR . "/views/client/header.php" ?>

<div class="container mt-5">
    <div class="row">
        <!-- Hình ảnh sản phẩm -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <img src="<?= $product['Image'] ?>" alt="<?= $product['ProductName'] ?>" class="img-fluid rounded">
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="display-5 fw-bold"><?= $product['ProductName'] ?></h1>
            <p class="fs-4 text-danger fw-bold"><?= number_format($product['Price']) ?> VND</p>

            <div class="mt-4">
                <p><strong>Kích thước:</strong> <?= $product['Dimensions'] ?></p>
                <p><strong>Chất liệu:</strong> <?= $product['Material'] ?></p>
                <p><strong>Màu sắc:</strong> <?= $product['Color'] ?></p>
            </div>

            <!-- Nút thêm vào giỏ hàng -->
            <div class="d-flex gap-3 mt-4">
                <a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>" class="btn btn-primary btn-lg">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                </a>
                <button class="btn btn-warning btn-lg">
                    <i class="bi bi-bag-check"></i> Mua ngay
                </button>
            </div>

            <hr class="mt-5">
            <h2 class="h4">Mô tả sản phẩm</h2>
            <p class="text-muted"><?= $product['Description'] ?></p>
        </div>
    </div>

    <!-- Phần bình luận -->
    <div class="mt-5">
        <hr>
        <h3>Bình luận</h3>
        <div class="comment-list mt-4">
            <?php foreach ($comments as $comment): ?>
                <div class="mb-3 p-3 rounded shadow-sm bg-light">
                    <p class="fw-bold mb-1"><?= $comment['FullName'] ?> 
                        <small class="text-muted"><?= date('d-m-Y H:i:s', strtotime($comment['created_at'])) ?></small>
                    </p>
                    <p class="mb-0"><?= $comment['Content'] ?></p>
                </div>
            <?php endforeach ?>
        </div>

        <!-- Form bình luận -->
        <?php if (isset($_SESSION['user'])): ?>
            <form action="" method="POST" class="mt-4">
                <div class="form-floating mb-3">
                    <textarea name="Content" class="form-control" placeholder="Viết bình luận của bạn" id="commentContent" style="height: 100px"></textarea>
                    <label for="commentContent">Viết bình luận của bạn...</label>
                </div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        <?php else: ?>
            <div class="alert alert-warning mt-4">
                Bạn cần <b><a href="<?= ROOT_URL . '?ctl=login' ?>">đăng nhập</a></b> để bình luận.
            </div>
        <?php endif ?>
    </div>
</div>

<?php include_once ROOT_DIR . "views/client/footer.php" ?>

<!-- Bootstrap CSS và JS -->
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
