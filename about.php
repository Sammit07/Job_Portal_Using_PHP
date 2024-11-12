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
    <title>About me</title>
</head>
<body class="about">
    <?php include 'menu.inc'; ?>
    <?php include 'header.inc'; ?>

    <figure>
      <img src="images/My-photo.png" alt="Your Photo" style="width: 1800px; height: auto;">
      <figcaption>My Photo</figcaption>
    </figure>
    <dl>
        <dt>My name</dt>
        <dd>Sammit Rajaram Raut</dd>
        <dt>Student number</dt>
        <dd>104691259</dd>
        <dt>My tutor name</dt>
        <dd>Mustafa Farsichi</dd>
        <dt>My Course Name</dt>
        <dd>Master of Information Technology</dd>
    </dl>
      <table>
        <caption>My Timetable</caption>
        <tr>
          <th>Day</th>
          <th>Time</th>
          <th>Course</th>
        </tr>
        <tr>
          <!-- Monday -->
          <td>Monday</td>
          <td>05:30 PM - 06:30 PM</td>
          <td>Technology Inquiry Project</td>
        </tr>
        <tr>
          <!-- Tuesday -->
          <td rowspan="2">Tuesday</td>
          <td>04:30 PM - 05:30 PM</td>
          <td>Creating Web Applications</td>
        </tr>
        <tr>
          <td>12:30 PM - 02:30 PM</td>
          <td>Software Quality and Testing</td>
        </tr>
        <tr>
          <!-- Wednesday -->
          <td rowspan="2">Wednesday</td>
          <td>08:30 AM - 09:30 AM</td>
          <td>Software Quality and Testing</td>
        </tr>
        <tr>
          <td>04:30 PM - 06:30 PM</td>
          <td>Data Management for the Big Data Age</td>
        </tr>
        <tr>
          <!-- Thursday -->
          <td>Thursday</td>
          <td>06:30 PM - 08:30 PM</td>
          <td>Technology Inquiry Project</td>
        </tr>
        <tr>
          <!-- Friday -->
          <td rowspan="2">Friday</td>
          <td>12:30 PM - 01:30 PM</td>
          <td>Data Management for the Big Data Age</td>
        </tr>
        <tr>
          <td>05:30 PM - 07:30 PM</td>
          <td>Creating Web Applications</td>
        </tr>
      </table>
      <section class="profile">
        <h2>Demographic Information</h2>
        <ul>
            <li><strong>Age:</strong> 22</li>
            <li><strong>Gender:</strong> male</li>
            <li><strong>Ethnicity:</strong> Asian</li>
            <li><strong>Education Level:</strong> Bachelor of Engineering</li>
        </ul>
      </section>
      
      <div id = "cv">
        <p>I'm passionate about technology and love to explore new programming languages and frameworks. In my free time, I enjoy reading science fiction novels.</p>
        <p>Download my <a href="images/SammitCV.png" download>CV</a>.</p>
      </div>
    <?php include 'footer.inc'; ?>
</body>
</html>