<!DOCTYPE html>
<html lang="en">
<body>
<div class="col-10">
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Patronymic</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($data); $i++) {
            ?>
            <tr>
                <th><?= $data[$i]->getId() ?></th>
                <td><?= $data[$i]->getLastName() ?></td>
                <td><?= $data[$i]->getFirstName() ?></td>
                <td><?= $data[$i]->getPatronymic() ?></td>
                <td><?= $data[$i]->getEmail() ?></td>
                <td><?= $data[$i]->getPhone() ?></td>
                <td><?= $data[$i]->getPassword() ?></td>
                <td><?= $data[$i]->getRole() ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
