<?php
require 'db.php';
$result = $conn->query("SELECT * FROM users");
?>

<h2>Manage Users</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
