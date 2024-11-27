<?php
include("../includes/db_connection.php");
session_start();

// Check if the user is already logged in, redirect to admin.php
if (isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
    exit;
}

// Display any error message passed from process_login.php
$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login - Travel Destinations</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Admin Login</h1>

        <!-- Display login error message if available -->
        <?php if (!empty($message)) { ?>
            <p style="color: red;"><?php echo htmlspecialchars($message); ?></p>
        <?php } ?>

        <form action="process_login.php" method="post">
            <p>Username: <input type="text" name="username" required></p>
            <p>Password: <input type="password" name="password" required></p>
            <p><input type="submit" value="Login"></p>
        </form>
    </div>
</body>

</html>