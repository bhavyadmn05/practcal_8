<?php
session_start();
include("../includes/db_connection.php");

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form was submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = $_POST['password'];

    // Fetch user from the database
    $query = "SELECT * FROM admins WHERE username = '{$username}' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($admin = mysqli_fetch_assoc($result)) {
        // Hash the entered password to compare with stored hash
        $hashed_password = hash("sha256", $password);

        if ($hashed_password === $admin['hashed_password']) {
            // Successful login, set session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            header("Location: admin.php");
            exit;
        } else {
            // Incorrect password
            $message = "Incorrect username or password.";
        }
    } else {
        // Username not found
        $message = "Incorrect username or password.";
    }
} else {
    $message = "Please enter username and password.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Error</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Login Error</h1>
        <p><?php echo $message; ?></p>
        <p><a href="login.php">Go back to login</a></p>
    </div>
</body>

</html>