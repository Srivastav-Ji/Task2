<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome to Dashboard</h2>
<p>You are logged in as <strong><?= $_SESSION['user_id'] ?></strong></p>

<a href="register.php"><button>Create New User</button></a>
<a href="manage_users.php"><button>Read / Manage Users</button></a>
<a href="logout.php"><button>Logout</button></a>
