<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email Address" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <input type="submit" value="Register">
</form>
