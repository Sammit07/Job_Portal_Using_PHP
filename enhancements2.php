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

    <section>
        <h2 class="enhancement-title">1. Countdown Timer:</h2>
        <p class="enhancement-description">This enhancement adds a countdown timer to the <a href="apply.php" class="page-link">Apply</a> page, which limits the time a user has to complete an application. When the timer reaches zero, a warning is displayed, and the browser redirects to the home page.</p>
        <p class="implementation-steps">To implement this feature, follow these steps:</p>
        <ol class="implementation-steps">
            <li>Create a JavaScript file named enhancements.js.</li>
            <li>Add the countdown timer code to <code>enhancements.js</code></li>
        
            
        </ol>

        
        <pre class ="abc"><code class="code">
// JavaScript code here
// Get the element where you want to display the countdown timer
const countdownElement = document.getElementById("countdown");

// Set the duration of the countdown in seconds (e.g., 10 minutes = 600 seconds)
const countdownDuration = 600;

// Function to update the countdown timer display
function updateCountdown() {
    const minutes = Math.floor(countdownDuration / 60);
    const seconds = countdownDuration % 60;
    countdownElement.textContent = `${minutes}:${seconds &lt; 10 ? "0" : ""}${seconds}`;
}

// Start the countdown
let countdownInterval = setInterval(function () {
    countdownDuration--;
    updateCountdown();

    // Check if the countdown is complete
    if (countdownDuration === 0) {
        clearInterval(countdownInterval); // Stop the countdown
        alert("Time's up! Your session has expired."); // Display a warning message
        window.location.href = "index.html"; // Redirect to the home page
    }
}, 1000); // Update every second

// Initialize the countdown display
updateCountdown();
        </code></pre>

        <ol start="3" class="implementation-steps">
            
            <li>In your <code>apply.html</code> file, add an element with the ID <code>countdown</code> where you want to display the countdown timer.</li>
        
        </ol>

        <pre class="abc"><code class="code">

&lt;p&gt;Time remaining: &lt;span id="countdown"&gt;10:00&lt;/span&gt;&lt;/p&gt;
        </code></pre>

        <ol start="4" class="implementation-steps">
            
            <li>Include a reference to <code>enhancements.js</code> in your <code>apply.html</code> file just before the closing &lt;/body&gt; tag:</li>
        </ol>

        <pre class ="abc"><code class="code">
// More JavaScript code here
&lt;script src="enhancements.js"&gt;&lt;/script&gt;
        </code></pre>

        <p class="completion-description">Now, when users visit the Apply page, they will see the countdown timer. If they don't complete the application within the specified time, they will receive a warning and be redirected to the home page.</p>
        <p class="completion-description">Reference:<a href = "https://www.geeksforgeeks.org/create-countdown-timer-using-javascript/">https://www.geeksforgeeks.org/create-countdown-timer-using-javascript/</a> </p>
    </section>
    <br>
    <br>

    <section>
        <h2 class="enhancement-title">2. Quotes Slideshow:</h2>
        <p class="enhancement-description">This enhancement adds a dynamic slideshow of motivational quotes to inspire applicants on the <a href="apply.php" class="page-link">Apply</a> page.</p>
        <p class="implementation-steps">To implement this feature, follow these steps:</p>
        <ol class="implementation-steps">
            <li>Create a JavaScript file named enhancements.js.</li>
            <li>Add the JavaScript code for the slideshow to <code>enhancements.js</code></li>
        
            
        </ol>

        
        <pre class = "abc"><code class="code">
// JavaScript code for the slideshow
const sentences = document.querySelectorAll('.motivational-section p');
let currentIndex = 0;

function displaySentence(index) {
    sentences.forEach((sentence, i) => {
        if (i === index) {
            sentence.style.display = 'block';
        } else {
            sentence.style.display = 'none';
        }
    });
}

function nextSentence() {
    currentIndex = (currentIndex + 1) % sentences.length;
    displaySentence(currentIndex);
}

function previousSentence() {
    currentIndex = (currentIndex - 1 + sentences.length) % sentences.length;
    displaySentence(currentIndex);
}

// Initially display the first sentence
displaySentence(currentIndex);

// Set an interval to change sentences every few seconds
setInterval(nextSentence, 5000); // Change sentence every 5 seconds
        </code></pre>

        <ol start="3" class="implementation-steps">
            
            <li>In your <code>apply.html</code> file, add an element with the class <code>slideshow-section</code> where you want to display the motivational sentences.</li>
        
        </ol>

        <pre class ="abc"><code class="code">
<!-- HTML code here -->
&lt;section class="slideshow-section"&gt;
    &lt;p&gt;"Every great journey begins with a single step. Your application today could be the start of an amazing career journey with us."&lt;/p&gt;
    &lt;p&gt;"Success is a journey, not a destination. Take the first step by submitting your application and see where it leads."&lt;/p&gt;
    &lt;p&gt;"Believe in yourself and your unique abilities. We're excited to discover the talents you'll bring to our team."&lt;/p&gt;
&lt;/section&gt;
        </code></pre>

        <ol start="4" class="implementation-steps">
            
            <li>Include a reference to <code>slideshow.js</code> in your <code>apply.html</code> file just before the closing &lt;/body&gt; tag:</li>
        </ol>

        <pre class="abc"><code class="code">

&lt;script src="slideshow.js"&gt;&lt;/script&gt;
        </code></pre>

        <p class="completion-description">Now, when applicants visit the Apply page, they will see a dynamic slideshow of motivational sentences to inspire them during the application process.</p>
        <p class="completion-description">Reference:<a href = "https://www.w3schools.com/howto/howto_js_quotes_slideshow.asp">https://www.w3schools.com/howto/howto_js_quotes_slideshow.asp</a> </p>
    </section>

    <?php include 'footer.inc'; ?>
</body>
</html>