<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - product</title>
</head>
<body>
<div class="row ml-1 mt-5">
    <div class="col-11 text-center">
        <p class="f-size-name">Добавить новый продукт</p>
    </div>
    <div class="col-11">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="admin_wd">Name</th>
                <th scope="col" class="admin_wd">Description</th>
                <th scope="col" class="admin_wd">Price</th>
                <th scope="col" class="admin_wd">Unit</th>
                <th scope="col" class="admin_wd">Amount</th>
                <th scope="col" class="admin_wd bg-success">Add</th>
            </tr>
            </thead>
            <form action="http://practice/admin/product" method="post">
                <tbody>
                <tr>
                    <td>
                        <textarea name="name" cols="21" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="description" cols="60" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="price" cols="15" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="unit" cols="15" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="amount" cols="15" rows="6"></textarea>
                    </td>
                    <td class="align-middle text-center bg-success">
                        <input type="submit" name="btn" value="Add">
                    </td>
                </tr>
                </tbody>
            </form>
        </table>
    </div>
</div>
<div class="row ml-1 mt-5">
    <div class="col-11">
        <div class="col-12 text-center">
            <p class="f-size-name">Список всех продуктов</p>
        </div>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="admin_wd">Id</th>
                <th scope="col" class="admin_wd">Name</th>
                <th scope="col" class="admin_wd">Description</th>
                <th scope="col" class="admin_wd">Price</th>
                <th scope="col" class="admin_wd">Unit</th>
                <th scope="col" class="admin_wd">Amount</th>
                <th scope="col" class="admin_wd">Vendor</th>
                <th scope="col" class="admin_wd bg-danger">Delete</th>
                <th scope="col" class="admin_wd bg-warning">Change</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($data['product']); $i++) {
                ?>
                <form action="http://practice/admin/product" method="post">
                    <tr>
                        <td class="align-middle text-center">
                            <input class="text-center" type="text" readonly size="1" name="id" value="<?= $data['product'][$i]->getId() ?>">
                        </td>
                        <td>
                            <textarea name="name" cols="21" rows="6"><?= $data['product'][$i]->getName() ?></textarea>
                        </td>
                        <td>
                            <textarea name="description" cols="60" rows="6"><?= $data['product'][$i]->getDescription() ?></textarea>
                        </td>
                        <td>
                            <textarea name="price" cols="15" rows="6"><?= $data['product'][$i]->getPrice() ?></textarea>
                        </td>
                        <td>
                            <textarea name="unit" cols="15" rows="6"><?= $data['product'][$i]->getUnit() ?></textarea>
                        </td>
                        <td>
                            <textarea name="amount" cols="15" rows="6"><?= $data['product'][$i]->getAmount() ?></textarea>
                        </td>
                        <td>
                            <select name="vendor">
                                <?php
                                for ($j = 0; $j < count($data['all_vendor']); $j++) {
                                    ?>
                                    <option <?php if ($data['all_vendor'][$j]->getName() == $data['vendor_product'][$i]->getName()){ ?> selected <?php } ?>
                                            value="<?= $data['vendor_product'][$j]->getName() ?>"><?= $data['vendor_product'][$j]->getName() ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td class="align-middle text-center bg-danger">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox<?= $data['product'][$i]->getId() ?>">
                                <label class="custom-control-label" for="checkbox<?= $data['product'][$i]->getId() ?>"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center bg-warning">
                            <input type="submit" name="btn" value="Save">
                        </td>
                    </tr>
                </form>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
