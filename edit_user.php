<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_users.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
    <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
    <input type="text" name="phone" value="<?= $user['phone'] ?>" required><br>
    <input type="submit" value="Update">
</form>
