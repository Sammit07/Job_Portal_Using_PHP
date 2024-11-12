<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
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
  
<div style="max-width: 600px; margin: 0 auto;">
    <form class="form-style" action="listallEOI.php" method="get" style="border: 1px solid #ccc; padding: 20px; border-radius: 5px; margin: 20px auto;">
        <input type="hidden" name="listAll" value="true">
        <input type="submit" value="List all EOIs">
    </form>
    

    
    <form class="form-style" action="listbyjobRefNum.php" method="get" style="border: 1px solid #ccc; padding: 20px; border-radius: 5px; margin: 20px auto;">
    
        <label for="jobRefNumber">Job Reference Number:</label>
        <input type="text" id="jobRefNumber" name="jobRefNumber">
        <input type="submit" value="List EOIs for Position">
    
    </form>

    
    <form class="form-style" action="listbyApplicant.php" method="get" style="border: 1px solid #ccc; padding: 20px; border-radius: 5px; margin: 20px auto;">
    
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName">
        <input type="submit" value="List EOIs for Applicant">
    
    </form>

    <form class="form-style" action="delete.php" method="get" style="border: 1px solid #ccc; padding: 20px; border-radius: 5px; margin: 20px auto;">
    
        <label for="deleteJobRef">Job Reference to Delete:</label>
        <input type="text" id="deleteJobRef" name="deleteJobRef">
        <input type="hidden" name="jobRefNumber" value="">
   
        <input type="submit" value="Delete EOIs">
    </form>

    <form class="form-style" action="updateStatus.php" method="post" style="border: 1px solid #ccc; padding: 20px; border-radius: 5px; margin: 20px auto;">
    
        <label for="eoiNumber">EOI Number to Update:</label>
        <input type="text" id="eoiNumber" name="eoiNumber">
        <label for="newStatus">New Status:</label>
        <input type="text" id="newStatus" name="newStatus">
        <input type="submit" value="Update Status">
    
    </form>
</div>

<div id="logout-btn" style=" margin-top: 10px; right: 10px;">
        <form action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form>
</div>

</body>
</html>