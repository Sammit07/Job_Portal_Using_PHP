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
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: apply.php');
    exit;
}
require_once("settings.php"); //connection info
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    $sql_table = "eoi";
    $sql = "CREATE TABLE IF NOT EXISTS eoi (
        EOInumber INT AUTO_INCREMENT,
        jobReference VARCHAR(5) NOT NULL,
        firstName VARCHAR(20) NOT NULL,
        lastName VARCHAR(20) NOT NULL,
        dob VARCHAR(20) NOT NULL,
        gender ENUM('Male', 'Female', 'Other') NOT NULL,
        streetAddress VARCHAR(40) NOT NULL,
        suburbTown VARCHAR(40) NOT NULL,
        state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
        postcode CHAR(4) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(12) NOT NULL,
        skills SET('HTML', 'CSS', 'OTHER SKILLS'),
        otherSkills TEXT,
        Status ENUM('New', 'Current', 'Final') NOT NULL,
        PRIMARY KEY (EOInumber)
    )";
    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
    
        // Initialize the error message variable
        $errMsg = "";
    
        // Sanitize and validate input data
        $jobRefNumber = isset($_POST['jobReference']) ? mysqli_real_escape_string($conn, $_POST['jobReference']) : '';
        $firstName = isset($_POST['firstName']) ? mysqli_real_escape_string($conn, $_POST['firstName']) : '';
        $lastName = isset($_POST['lastName']) ? mysqli_real_escape_string($conn, $_POST['lastName']) : '';
        $dateOfBirth = isset($_POST['dob']) ? mysqli_real_escape_string($conn, $_POST['dob']) : '';
        $gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : '';
        $streetAddress = isset($_POST['streetAddress']) ? mysqli_real_escape_string($conn, $_POST['streetAddress']) : '';
        $suburb = isset($_POST['suburbTown']) ? mysqli_real_escape_string($conn, $_POST['suburbTown']) : '';
        $state = isset($_POST['state']) ? mysqli_real_escape_string($conn, $_POST['state']) : '';
        $postcode = isset($_POST['postcode']) ? mysqli_real_escape_string($conn, $_POST['postcode']) : '';
        $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
        $phoneNumber = isset($_POST['phone']) ? mysqli_real_escape_string($conn, $_POST['phone']) : '';
        $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : '';
        $otherSkills = isset($_POST['otherSkills']) ? $_POST['otherSkills'] : '';
        $additionalSkills = isset($_POST['additionalSkills']) ? mysqli_real_escape_string($conn, $_POST['additionalSkills']) : '';
    
        // Check for empty fields
        if (empty($jobRefNumber) || empty($firstName) || empty($lastName) || empty($dateOfBirth) || empty($gender) || empty($streetAddress) || empty($suburb) || empty($state) || empty($postcode) || empty($email) || empty($phoneNumber) || empty($skills)) {
            $errMsg .= "<li>please fill all the required fields.</li>";
        }


        if ($postcode == "") {
            $errMsg .= "<p>You must enter your postcode.</p>";
        } elseif (!preg_match('/^\d{4}$/', $postcode) || ($state == 'VIC' && substr($postcode, 0, 1) != '3') || ($state == 'NSW' && substr($postcode, 0, 1) != '2') || ($state == 'QLD' && substr($postcode, 0, 1) != '4') || ($state == 'NT' && substr($postcode, 0, 1) != '0') || ($state == 'WA' && substr($postcode, 0, 1) != '6') || ($state == 'SA' && substr($postcode, 0, 1) != '5') || ($state == 'TAS' && substr($postcode, 0, 1) != '7') || ($state == 'ACT' && substr($postcode, 0, 1) != '0')) {
            $errMsg .= "<p>Postcode should be exactly 4 digits and should match the state.</p>";
        }


        
        
        
        
        

        // Validation for street address
        if ($streetAddress == "") {
            $errMsg .= "<p>You must enter your street address.</p>";
        } elseif (strlen($streetAddress) > 40) {
            $errMsg .= "<p>Street address should be maximum 40 characters.</p>";
        }
        
        // Validation for suburb
        if ($suburb == "") {
            $errMsg .= "<p>You must enter your suburb.</p>";
        } elseif (strlen($suburb) > 40) {
            $errMsg .= "<p>Suburb should be maximum 40 characters.</p>";
        }
        
        // Validation for email
        if ($email == "") {
            $errMsg .= "<p>You must enter your email.</p>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errMsg .= "<p>Invalid email format.</p>";
        }
        
        // Validation for phone number
        if ($phoneNumber == "") {
            $errMsg .= "<p>You must enter your phone number.</p>";
        } elseif (!preg_match('/^[\d\s]{8,12}$/', $phoneNumber)) {
            $errMsg .= "<p>Phone number should be 8 to 12 digits or spaces.</p>";
        }

        if (empty($skills)) {
            $errMsg .= "<p>You must select at least one skill.</p>";
        }
        
        // Validation for otherSkills
        if ($otherSkills && empty($additionalSkills)) {
            $errMsg .= "<p>You must provide additional skills if 'Other Skills' is selected.</p>";
        }

        if (empty($jobRefNumber)) {
            $errMsg .= "<p>Job reference number is required.</p>";
        } elseif (!preg_match('/^[A-Za-z0-9]{5}$/', $jobRefNumber)) {
            $errMsg .= "<p>Job reference number should be exactly 5 alphanumeric characters.</p>";
        }
        
        // Validation for first name
        if (empty($firstName)) {
            $errMsg .= "<p>You must enter your first name.</p>";
        } elseif (strlen($firstName) > 20 || !preg_match('/^[A-Za-z]+$/', $firstName)) {
            $errMsg .= "<p>First name should be maximum 20 alphabetical characters.</p>";
        }
        
        
        if ($lastName == "") {
            $errMsg .= "<p>You must enter your last name.</p>";
        } elseif (!preg_match("/^[a-zA-Z\-]*$/", $lastName)) {
            $errMsg .= "<p>Only alpha letters or hyphens allowed in your lastname</p>";
        }
        
        if ($dateOfBirth == "") {
            $errMsg .= "<p>You must enter your date of birth.</p>";
        } elseif (!preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $dateOfBirth, $matches)) {
            $errMsg .= "<p>Date of birth should be in the format dd/mm/yyyy.</p>";
        } else {
            $day = $matches[1];
            $month = $matches[2];
            $year = $matches[3];
            if (!checkdate($month, $day, $year)) {
                $errMsg .= "<p>Invalid date of birth.</p>";
            } else {
                // Check if the age of the person is between 15 and 80
                $today = new DateTime();
                $birthdate = new DateTime("$year-$month-$day");
                $age = $birthdate->diff($today)->y;
                if ($age < 15 || $age > 80) {
                    $errMsg .= "<p>Age must be between 15 and 80 years old.</p>";
                }
            }
        }

                        

          
        
       
        
        if ($errMsg != "") {
            header("Location: error.php?errMsg=" . urlencode($errMsg));
            exit;
        } else {
            // Insert sanitized data into the database
            $insertSql = "INSERT INTO eoi (jobReference, firstName, lastName, dob, gender, streetAddress, suburbTown, State, postcode, email, phone, skills, otherSkills, Status)
                VALUES ('$jobRefNumber', '$firstName', '$lastName', '$dateOfBirth', '$gender', '$streetAddress', '$suburb', '$state', '$postcode', '$email', '$phoneNumber', '$skills', '$additionalSkills', 'New')";
    
            if ($conn->query($insertSql) === TRUE) {
                $eoiNumber = $conn->insert_id; // Get the unique EOInumber
    
                // Close the database connection
                $conn->close();
    
                // Display the confirmation message with the EOInumber
                echo "Thank you for your application! Your Expression of Interest Number is: $eoiNumber";
            } else {
                echo "Error: " . $insertSql . "<br>" . $conn->error;
            }
        }
    } else {
        // Redirect to an error page if accessed directly
        header("Location: error.php");
    }
}
    ?>
<?php include 'footer.inc'; ?>
</body>
</html>