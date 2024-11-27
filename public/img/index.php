<?php include("../includes/db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destinations</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Travel Destinations</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php">Admin Login</a>
        </nav>
        <h2>Explore Our Destinations</h2>
        
        <?php
        // Fetch all destinations
        $query = "SELECT * FROM destinations WHERE visible = 1";
        $result = mysqli_query($connection, $query);

        while ($destination = mysqli_fetch_assoc($result)) {
            echo "<h3>" . htmlspecialchars($destination['name']) . "</h3>";
            echo "<p>" . htmlspecialchars($destination['description']) . "</p>";
            echo "<a href=\"destination.php?id=" . urlencode($destination['id']) . "\">Read More</a>";
        }
        ?>
    </div>
</body>
</html>

<?php
mysqli_free_result($result);
mysqli_close($connection);
?>