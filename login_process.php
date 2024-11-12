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
    if (isset($_POST['userid']) && isset($_POST['password'])) {
        $userid = $_POST['userid'];
        $password = $_POST['password'];
    
        $query = "SELECT password FROM managers WHERE username = '$userid'";
        $result = $conn->query($query);
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];
    
            if ($password === $stored_password) {
                session_start();
                $_SESSION['loggedin'] = true;
                header("Location: manage.php");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found. Please register first <a href='register.php' style='color: blue; text-decoration: underline;'>here</a>.";
        }
    }
    
    $conn->close();
}
    ?>
    </body>
</html>