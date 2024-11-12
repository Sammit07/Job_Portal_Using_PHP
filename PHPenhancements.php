<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment part3">
    <meta name="keywords" content="HTML5">
    <meta name="author" content="Sammit Raut">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/apply.js"></script>
    <script src="scripts/enhancements.js"></script>
    <title>Apply Now</title>
</head>
<body id="Enhancements2-element">
    
    <?php include 'menu.inc'; ?>
    <?php include 'header.inc'; ?>

    <h1 style="color: white;">Enhancements implemented:</h1>
    <br>
    <br>
    <section>
        <h2 class="enhancement-title">1. Manager Registration and Login</h2>
        <p class="enhancement-description">This enhancement introduces a manager registration and login system to the <a href="login.php" class="page-link">website</a>. It enables new managers to register with unique credentials and allows existing managers to securely log in to their accounts to manage job applications.</p>
        <p class="implementation-steps">To implement this feature, follow these steps:</p>
        <ol class="implementation-steps">
            <li>Create HTML forms for manager registration and login.</li>
            <li>Implement server-side scripts (e.g., PHP) for processing registration and login requests.</li>
            <li>Set up a secure database to store manager account details.</li>
        </ol>
        <p class="completion-description">With this enhancement, the job application system becomes more secure and efficient by enabling authorized managers to access and manage application data.</p>
        <p class="completion-description">Reference:<a href = "https://www.w3schools.blog/php-program-to-create-login-and-logout-using-sessions">https://www.w3schools.blog/php-program-to-create-login-and-logout-using-sessions</a> </p>
    </section>
    <br>
    <br>
    <br>

    
    <section>
        <h2 class="enhancement-title">2. Logout Functionality</h2>
        <p class="enhancement-description">This enhancement provides a logout <a href="manage.php" class="page-link">feature</a> for managers, allowing them to securely end their sessions and log out of the system. It prevents unauthorized access to sensitive information and improves overall system security.</p>
        <p class="implementation-steps">To implement this feature, follow these steps:</p>
        <ol class="implementation-steps">
            <li>Create a logout button or link in the manager's account interface.</li>
            <li>Implement a server-side script to handle logout requests and destroy the current session.</li>
        </ol>
        <p class="completion-description">With the logout functionality, managers can ensure the security of their accounts and data, reducing the risk of unauthorized access and data breaches.</p>
        <p class="completion-description">Reference:<a href = "https://www.w3schools.blog/php-program-to-create-login-and-logout-using-sessions">https://www.w3schools.blog/php-program-to-create-login-and-logout-using-sessions</a> </p>
    </section>

    
    <?php include 'footer.inc'; ?>
</body>
</html>