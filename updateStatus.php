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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eoiNumber']) && !empty($_POST['eoiNumber']) && isset($_POST['newStatus']) && !empty($_POST['newStatus'])) {
            $eoiNumber = mysqli_real_escape_string($conn, $_POST['eoiNumber']);
            $newStatus = mysqli_real_escape_string($conn, $_POST['newStatus']);
            $query_update = "UPDATE eoi SET Status = '$newStatus' WHERE EOInumber = '$eoiNumber'";
            $result_update = mysqli_query($conn, $query_update);

            if ($result_update) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "Status updated successfully.";
                    $query_select = "SELECT * FROM eoi";
                    $result_select = mysqli_query($conn, $query_select);
                    echo "<table class='table-style' style='width: 80%; margin: 0 auto;'><tr><th>EOInumber</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($result_select)) {
                        echo "<tr><td>" . $row["EOInumber"] . "</td><td>" . $row["jobReference"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["Status"] . "</td></tr>";
                    }
                } else {
                    echo "No matching records found to update.";
                }
            } else {
                echo "Error in updating status: " . mysqli_error($conn);
            }
        } else {
            echo "Please provide both EOI number and new status to update.";
        }
        mysqli_close($conn);
    }
    ?>
</body>
</html>