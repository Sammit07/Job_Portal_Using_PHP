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
    <h2>Login for Managers<h2>
        <h3>New user. Register <a href='register.php' style='color: blue; text-decoration: underline;'>here</a> first.
    <div style="max-width: 600px; margin: 0 auto;">
        <form method="post" action="login_process.php" style="border: 1px solid #ccc; padding: 20px; border-radius: 5px; margin: 20px auto;">
            <label for="userid">Username:</label><br>
            <input type="text" id="userid" name="userid" style="width: 100%; height: 30px;" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" style="width: 100%; height: 30px;" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <?php include 'footer.inc'; ?>
</body>
</html>