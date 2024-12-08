<?php include_once ROOT_DIR . "views/admin/header.php" ?>

<style>
    /* CSS cho phần thông báo thành công */
    .alert-success {
        background-color: #d4edda; /* Màu xanh lá cây nhạt */
        color: #155724; /* Màu chữ xanh đậm */
        border-color: #c3e6cb; /* Màu viền nhạt */
        padding-right: 50px;
    }

    /* CSS cho phần thông báo lỗi */
    .alert-danger {
        background-color: #f8d7da; /* Màu đỏ nhạt */
        color: #721c24; /* Màu chữ đỏ đậm */
        border-color: #f5c6cb; /* Màu viền đỏ nhạt */
        padding-right: 50px;
    }

    .alert-dismissible .btn-close {
        position: absolute;
        right: 10px;
        top: 10px;
    }

    /* CSS cho bảng danh mục */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .table {
        width: 100%;
        table-layout: fixed;
    }

    /* CSS cho nút Thêm danh mục */
    .btn-success {
        margin-left: auto;
    }

    /* CSS cho các nút hành động Sửa và Xóa */
    .btn-sm {
        padding: 5px 10px;
    }

    /* CSS cho các cột trong bảng */
    th, td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<div class="page-content p-4">
    <?php if ($message) : ?>
        <div class="alert alert-<?= $type ?? 'success' ?> alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách Danh Mục</h2>
            <a href="<?= ADMIN_URL . '?ctl=adddm' ?>" class="btn btn-success btn-lg">+ Thêm danh mục</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên Danh Mục</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $cate) : ?>
                        <tr>
                            <td><?= $cate['id'] ?></td>
                            <td><?= $cate['CategoryName'] ?></td>
                            <td class="text-center">
                                <a href="<?= ADMIN_URL . '?ctl=editdm&id=' . $cate['id'] ?>" class="btn btn-primary btn-sm me-1">Sửa</a>
                                <a href="<?= ADMIN_URL . '?ctl=deletedm&id=' . $cate['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once ROOT_DIR . "views/admin/footer.php" ?>
