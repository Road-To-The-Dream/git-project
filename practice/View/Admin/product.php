<!DOCTYPE html>
<html lang="en">
<body>
<div class="col-10">
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Unit</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($data); $i++) {
            ?>
            <tr>
                <th><?= $data[$i]->getId() ?></th>
                <td><?= $data[$i]->getName() ?></td>
                <td><?= $data[$i]->getDescription() ?></td>
                <td><?= $data[$i]->getPrice() ?></td>
                <td><?= $data[$i]->getUnit() ?></td>
                <td><?= $data[$i]->getAmount() ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
