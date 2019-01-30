<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="/View/JS/MaskPhone.js"></script>
</head>
<body>
<div class="row ml-1 mt-5">
    <div class="col-11 text-center">
        <p class="f-size-name">Добавить нового клиента</p>
    </div>
    <div class="col-11">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="admin_wd">Last Name</th>
                <th scope="col" class="admin_wd">First Name</th>
                <th scope="col" class="admin_wd">Patronymic</th>
                <th scope="col" class="admin_wd">Email</th>
                <th scope="col" class="admin_wd">Phone</th>
                <th scope="col" class="admin_wd">Password</th>
                <th scope="col" class="admin_wd">Role</th>
                <th scope="col" class="admin_wd bg-success">Add</th>
            </tr>
            </thead>
            <form action="http://practice/admin/addClient" method="post">
                <tbody>
                <tr>
                    <td>
                        <textarea name="last_name" cols="21" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="first_name" cols="21" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="patronymic" cols="21" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="email" cols="21" rows="6"></textarea>
                    </td>
                    <td>
                        <textarea name="phone" cols="21" rows="6" id="phone" placeholder="+380 (__) __-__-___"></textarea>
                    </td>
                    <td>
                        <textarea name="password" cols="21" rows="6"></textarea>
                    </td>
                    <td class="align-middle text-center">
                        <select name="role">
                            <option>admin</option>
                            <option>user</option>
                        </select>
                    </td>
                    <td class="align-middle text-center bg-success">
                        <input type="submit" value="Add">
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
            <p class="f-size-name">Список всех клиентов</p>
        </div>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col" class="admin_wd">Last Name</th>
                <th scope="col" class="admin_wd">First Name</th>
                <th scope="col" class="admin_wd">Patronymic</th>
                <th scope="col" class="admin_wd">Email</th>
                <th scope="col" class="admin_wd">Phone</th>
                <th scope="col" class="admin_wd">Password</th>
                <th scope="col" class="admin_wd">Role</th>
                <th scope="col" class="admin_wd bg-danger">Delete</th>
                <th scope="col" class="admin_wd bg-warning">Change</th>
            </tr>
            </thead>
                <tbody>
                <?php
                for ($i = 0; $i < count($data); $i++) {
                    ?>
                <form action="http://practice/admin/saveClient" method="post">
                    <tr>
                        <td class="align-middle text-center">
                            <input class="text-center" type="text" readonly size="1" name="id" value="<?= $data[$i]->getId() ?>">
                        </td>
                        <td>
                            <textarea name="last_name" cols="21" rows="6"><?= $data[$i]->getLastName() ?></textarea>
                        </td>
                        <td>
                            <textarea name="first_name" cols="21" rows="6"><?= $data[$i]->getFirstName() ?></textarea>
                        </td>
                        <td>
                            <textarea name="patronymic" cols="21" rows="6"><?= $data[$i]->getPatronymic() ?></textarea>
                        </td>
                        <td>
                            <textarea name="email" cols="21" rows="6"><?= $data[$i]->getEmail() ?></textarea>
                        </td>
                        <td>
                            <textarea name="phone" cols="21" rows="6" id="phone" placeholder="+380 (__) __-__-___"><?= $data[$i]->getPhone() ?></textarea>
                        </td>
                        <td>
                            <textarea name="password" cols="21" rows="6"><?= $data[$i]->getPassword() ?></textarea>
                        </td>
                        <td class="align-middle text-center">
                            <select name="role">
                                <option value="<?= $data[$i]->getRole() ?>"><?= $data[$i]->getRole() ?></option>
                                <?php
                                if ($data[$i]->getRole() == 'admin') {
                                    ?>
                                    <option value="user">user</option>
                                    <?php
                                } else {
                                    ?>
                                    <option value="admin">admin</option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td class="align-middle text-center bg-danger">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="checkbox" id="checkbox<?= $data[$i]->getId() ?>">
                                <label class="custom-control-label" for="checkbox<?= $data[$i]->getId() ?>"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center bg-warning">
                            <input type="submit" value="Save">
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
