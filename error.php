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
    <ul>
        <?php
            // Display the error messages
            if (isset($_GET['errMsg'])) {
                $errMsg = urldecode($_GET['errMsg']);
                echo $errMsg;
            }
        ?>
    </ul>
    <p>Please go back and fill in the <a href='apply.php' style='color: blue; text-decoration: underline;'>form</a> correctly.</p>
    <?php include 'footer.inc'; ?>
</body>
</html>