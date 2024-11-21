<?php
include_once ROOT_DIR . "./views/admin/header.php"
?>

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
                <th scope="col">Image</th>
                <th scope="col">CategoryID</th>
                <th>
                    <a href="<?= ADMIN_URL . "?ctl=addsp" ?>" class="btn btn-primary">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($sanpham as $spham) :
            ?>
            <tr>
                <th scope="row"><?= $spham['ProductID'] ?></th>
                <td><?= $spham['ProductName'] ?></td>
                <td>@<?= $spham['Price'] ?></td>
                <td>@<?= $spham['Material'] ?></td>
                <td>@<?= $spham['Color'] ?></td>
                <td>@<?= $spham['Dimensions'] ?></td>
                <td>
                    <img src="<?= ROOT_URL . $spham['img/imgda1'] ?>" width="60px" alt="">
                </td>
                <td><?= $spham['Category_name'] ?></td>
            </tr>
            <?php  endforeach ?>
        </tbody>
    </table>
</div>

<?php
include_once ROOT_DIR . "./views/admin/siderbar.php"
?>