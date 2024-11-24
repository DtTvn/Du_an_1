<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="page-content">
    <div class="container-fluid">
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ProductID</th>
                        <th scope="col">ProductName</th>
                        <th scope="col">Price</th>
                        <th scope="col">Material</th>
                        <th scope="col">Color</th>
                        <th scope="col">Dimensions</th>
                        <th scope="col">CategoryName</th>
                        <th scope="col">Image</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($sanpham as $spham) :
                    ?>
                        <tr>
                            <th scope="row"><?= $spham['id'] ?></th>
                            <td><?= $spham['ProductName'] ?></td>
                            <td><?= $spham['Price'] ?></td>
                            <td><?= $spham['Material'] ?></td>
                            <td><?= $spham['Color'] ?></td>
                            <td><?= $spham['Dimensions'] ?></td>
                            <td><?= $spham['CategoryName'] ?></td>
                            <td>
                                <img src="<?= ROOT_URL . $spham['Image'] ?>" width="60px" alt="">
                            </td>
                            <td>
                            <a href="<?= '?ctl=editsp&id=' . $spham['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= ADMIN_URL . '?ctl=deletesp&id=' . $spham['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th>
                            <a href="<?= "?ctl=addsp" ?>" class="btn btn-primary">Create</a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php include_once ROOT_DIR . "views/admin/footer.php" ?>