<?php
$host = 'localhost';
$user = 'root';
$pass = '2309';
$dbname = 'user_auth';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
