<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment part3">
    <meta name="keywords" content="HTML5 PHP">
    <meta name="author" content="Sammit Raut">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/apply.js"></script>
    <script src="scripts/enhancements.js"></script>
    <title>Jobs</title>
</head>
<body class="jobs">
    <?php include 'menu.inc'; ?>
    <?php include 'header.inc'; ?>
<?php
require_once("settings.php"); //connection info
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {

    // SQL query to create the managers table
    $sql = "CREATE TABLE IF NOT EXISTS managers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    

if (mysqli_query($conn, $sql)) {
    echo "Registered successfully. ";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $insert_query = "INSERT INTO managers (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $insert_query)) {
        echo "You can now <a href='login.php' style='color: blue; text-decoration: underline;'>login</a>.";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn); // Close the database connection
}
?>
</body>
</html>
    
