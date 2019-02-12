<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - vendor</title>
</head>
<body>
<div class="row ml-1 mt-5">
    <div class="col-11">
        <div class="col-12 text-center">
            <p class="f-size-name">Список всех комментариев</p>
        </div>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="admin_wd">Id</th>
                <th scope="col" class="admin_wd">Content</th>
                <th scope="col" class="admin_wd bg-danger">Delete</th>
                <th scope="col" class="admin_wd bg-warning">Change</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($data); $i++) {
                ?>
                <form action="http://practice/admin/comment" method="post">
                    <tr>
                        <td class="align-middle text-center">
                            <input class="text-center" type="text" readonly size="1" name="id" value="<?= $data[$i]->getId() ?>">
                        </td>
                        <td>
                            <textarea name="content" cols="100" rows="6"><?= $data[$i]->getContent() ?></textarea>
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
