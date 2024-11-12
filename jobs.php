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

    <section>
        <h2>Job Description: Systems Analyst</h2>
        <p><strong>Position Reference:</strong> IT001</p>
        <p><strong>Description:</strong> We are seeking a skilled Systems Analyst to join our team. The Systems Analyst will be responsible for analyzing and designing information systems to meet our business needs.</p>
        <p><strong>Salary Range:</strong> $70,000 - $90,000</p>
        <p><strong>Reports to:</strong> IT Manager</p>

        <h3>Key Responsibilities:</h3>
        <ul>
            <li>Analyze business requirements and translate them into technical specifications.</li>
            <li>Design and develop information systems, workflows, and processes.</li>
            <li>Collaborate with cross-functional teams to ensure successful implementation.</li>
        </ul>
        

        <h3>Required Qualifications:</h3>
        <ul>
            <li><strong>Essential:</strong> Bachelor's degree in Computer Science or related field.</li>
            <li><strong>Essential:</strong> Proficiency in database design and SQL.</li>
            <li><strong>Preferable:</strong> Experience with process modeling and data analysis.</li>
        </ul>
        <p><a href="apply.php" class="apply-button" data-position-ref="IT001" onclick="storePositionReference('IT001')">Apply</a></p>
    </section>
    <br>
    <br>

    <section>
        <h2>Job Description: Software Development Engineer</h2>
        <p><strong>Position Reference:</strong> IT002</p>
        <p><strong>Description:</strong> Join our team as a Software Development Engineer to build innovative software solutions that drive our business forward. You'll collaborate with a dynamic team of engineers to create high-quality applications.</p>
        <p><strong>Salary Range:</strong> $80,000 - $100,000</p>
        <p><strong>Reports to:</strong> Lead Software Engineer</p>

        <h3>Key Responsibilities:</h3>
        <ul>
            <li>Design, develop, and test software applications.</li>
            <li>Collaborate with cross-functional teams to gather requirements and deliver solutions.</li>
            <li>Participate in code reviews and provide constructive feedback.</li>
        </ul>

        <h3>Required Qualifications:</h3>
        <ul>
            <li><strong>Essential:</strong> Bachelor's degree in Computer Science or related field.</li>
            <li><strong>Essential:</strong> Proficiency in Java and object-oriented programming.</li>
            <li><strong>Preferable:</strong> Experience with web development and front-end frameworks.</li>
        </ul>
        <p><a href="apply.php" class="apply-button" data-position-ref="IT002" onclick="storePositionReference('IT002')">Apply</a></p>
    </section>
    <br>
    <br>

    <aside>
        <h2>Contact Information</h2>
        <p>If you're interested in any of the positions, please submit your application via our <a href="apply.html">online application form</a>. For inquiries, contact our HR department at 104691259@student.swin.edu.au.</p>
    </aside>


    <?php include 'footer.inc'; ?>
</body>
</html>