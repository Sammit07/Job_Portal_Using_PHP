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
    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        echo "<p>Database connection failure</p>";
    } else {
        $query = "SELECT * FROM jobs";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
                echo "<p><strong>Salary:</strong> $" . $row['salary'] . "</p>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "No jobs found.";
        }
        
        $conn->close();
    }
        ?>
        
        </body>
        </html>