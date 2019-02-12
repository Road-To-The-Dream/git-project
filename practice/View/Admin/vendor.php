<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - vendor</title>
</head>
<body>
<div class="row ml-1 mt-5">
    <div class="col-11 text-center">
        <p class="f-size-name">Добавить нового производителя</p>
    </div>
    <div class="col-11">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="admin_wd">Name</th>
                <th scope="col" class="admin_wd bg-success">Add</th>
            </tr>
            </thead>
            <form action="http://practice/admin/vendor" method="post">
                <tbody>
                <tr>
                    <td>
                        <textarea name="name" cols="100" rows="6"></textarea>
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
            <p class="f-size-name">Список всех производителей</p>
        </div>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="admin_wd">Id</th>
                <th scope="col" class="admin_wd">Name</th>
                <th scope="col" class="admin_wd bg-danger">Delete</th>
                <th scope="col" class="admin_wd bg-warning">Change</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($data); $i++) {
                ?>
                <form action="http://practice/admin/vendor" method="post">
                    <tr>
                        <td class="align-middle text-center">
                            <input class="text-center" type="text" readonly size="1" name="id" value="<?= $data[$i]->getId() ?>">
                        </td>
                        <td>
                            <textarea name="name" cols="100" rows="6"><?= $data[$i]->getName() ?></textarea>
                        </td>
                        <td class="align-middle text-center bg-danger">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox<?= $data[$i]->getId() ?>">
                                <label class="custom-control-label" for="checkbox<?= $data[$i]->getId() ?>"></label>
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
