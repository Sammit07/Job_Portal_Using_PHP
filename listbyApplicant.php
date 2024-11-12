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
        if ((isset($_GET['firstName']) && !empty($_GET['firstName'])) && (isset($_GET['lastName']) && !empty($_GET['lastName']))) {
            $firstName = mysqli_real_escape_string($conn, $_GET['firstName']);
            $lastName = mysqli_real_escape_string($conn, $_GET['lastName']);
            $query_applicant = "SELECT * FROM eoi WHERE firstName LIKE '%$firstName%' AND lastName LIKE '%$lastName%'";
            $result_applicant = mysqli_query($conn, $query_applicant);

            if ($result_applicant) {
                if (mysqli_num_rows($result_applicant) > 0) {
                    echo "<table class='table-style' style='width: 80%; margin: 0 auto;'><tr><th>EOInumber</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Status</th></tr>";
                    while ($row = mysqli_fetch_assoc($result_applicant)) {
                        echo "<tr><td>" . $row["EOInumber"] . "</td><td>" . $row["jobReference"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["Status"] . "</td></tr>";
                    }
                } else {
                    echo "No matching records found.";
                }
            } else {
                echo "Error in fetching data: " . mysqli_error($conn);
            }
        } else {
            echo "Please provide both first name and last name.";
        }
        mysqli_close($conn);
    }
    ?>
</body>
</html>