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
                            <th scope="row"><?= $spham['ProductID'] ?></th>
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

                                <a href=""><input type="button" value="Sửa" /></a>
                                <a href=""><input type="button" value="Xóa" /></a>
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