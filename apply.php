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
    <title>Apply Now</title>
</head>
<body class="jobs">
    <?php include 'menu.inc'; ?>
    <?php include 'header.inc'; ?>

    <section>
        <h2>Apply for a Position</h2>
        <p>Time remaining: <span id="countdown">10:00</span></p>
        <div class="slideshow-section">
            <p>"Every great journey begins with a single step. Your application today could be the start of an amazing career journey with us."</p>
            <p>"Success is a journey, not a destination. Take the first step by submitting your application and see where it leads."</p>
            <p>"Believe in yourself and your unique abilities. We're excited to discover the talents you'll bring to our team."</p>
        </div>
        <form method="post" action="processEOI.php" novalidate="novalidate">
            <!-- Job Reference Number -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="jobReference">Job Reference Number:</label>
            <input type="text" id="jobReference" name="jobReference" pattern="[A-Za-z0-9]{5}" required >
        </fieldset>  
            <!-- First Name -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" maxlength="20" required>
        </fieldset> 
            <!-- Last Name -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" maxlength="20" required>
        </fieldset> 
            <!-- Date of Birth -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="dob">Date of Birth (dd/mm/yyyy):</label>
            <input type="text" id="dob" name="dob" pattern="\d{1,2}/\d{1,2}/\d{4}" required>
        </fieldset> 
            <!-- Gender -->
            <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
                <label>Gender:</label>
                
                <label for="male"><input type="radio" id="male" name="gender" value="male"  required>Male</label>
                
                <label for="female"><input type="radio" id="female" name="gender" value="female"  required>Female</label>
                
                <label for="other"><input type="radio" id="other" name="gender" value="other"  required>Other</label><br>
            </fieldset>
            
            <!-- Street Address -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="streetAddress">Street Address:</label>
            <input type="text" id="streetAddress" name="streetAddress" maxlength="40" required>
        </fieldset> 
            <!-- Suburb/Town -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="suburbTown">Suburb/Town:</label>
            <input type="text" id="suburbTown" name="suburbTown" maxlength="40" required>
        </fieldset>  
            <!-- State -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="state">State:</label>
            <select id="state" name="state" required>
                <option value="" disabled selected>Select state</option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
            </select>
        </fieldset> 
            <!-- Postcode -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" pattern="\d{4}" required>
        </fieldset>
            <!-- Email Address -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
        </fieldset> 
            <!-- Phone Number -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="\d{8,12}" required><br>
        </fieldset>
            <!-- Skills -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label>Skills:</label>
            
            <label for="skill1"><input type="checkbox" id="HTML" name="skills[]" value="HTML">HTML</label>
            
            <label for="skill2"><input type="checkbox" id="CSS" name="skills[]" value="CSS" >CSS</label>
            
            <label for="otherSkills"><input type="checkbox" id="otherSkills" name="otherSkills" value="otherSkills" >OTHER SKILLS</label><br>
        </fieldset>
            <!-- Other Skills -->
        <fieldset style="width: 550px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; margin: 20px auto;">
            <label for="additionalSkills">Additional Skills:</label>
            <textarea id="additionalSkills" name="additionalSkills" rows="4"></textarea>
        </fieldset>
           <!-- Submit button for the form -->
                <button type="submit">Submit</button>
                <div id="error-messages"></div>
        </form>
    </section>

    <?php include 'footer.inc'; ?>
</body>
</html>