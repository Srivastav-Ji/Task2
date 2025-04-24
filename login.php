<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
			$_SESSION['user_name'] = $user['name'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "No user found.";
    }
}
?>

<form method="POST" action="">
    <input type="email" name="email" placeholder="Email Address" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="Login">
</form>
