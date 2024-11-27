<?php
include("../includes/db_connection.php");

// Get the destination ID from the URL
if (isset($_GET['id'])) {
    $destination_id = intval($_GET['id']);

    // Fetch the destination details from the database
    $query = "SELECT * FROM destinations WHERE id = {$destination_id} AND visible = 1 LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($destination = mysqli_fetch_assoc($result)) {
        // Store details in variables
        $name = htmlspecialchars($destination['name']);
        $location = htmlspecialchars($destination['location']);
        $description = htmlspecialchars($destination['description']);

        // Construct image path based on destination name
        $image_path = "images/" . strtolower($name) . ".jpg";
    } else {
        // Redirect if destination not found
        header("Location: index.php");
        exit;
    }
} else {
    // Redirect if no ID provided
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $name; ?> - Travel Destination</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .destination-image {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?php echo $name; ?></h1>
        <p><strong>Location:</strong> <?php echo $location; ?></p>

        <!-- Display image if it exists -->
        <?php if (file_exists($image_path)) { ?>
            <img src="<?php echo $image_path; ?>" alt="<?php echo $name; ?> Image" class="destination-image">
        <?php } else { ?>
            <p style="color: gray; font-style: italic;">Image not available.</p>
        <?php } ?>

        <p><?php echo $description; ?></p>
        <a href="index.php">Back to Destinations</a>
    </div>
</body>

</html>

<?php
// Close database connection
mysqli_free_result($result);
mysqli_close($connection);
?>