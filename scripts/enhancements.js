/*** 
* Author: Sammit Rajaram Raut 104691259
* Target: apply.html
* Purpose: Assignment1 part2
* Created: 20-09-2023
* last updated: 29-09-2023
*/
document.addEventListener("DOMContentLoaded", function () {
const countdownElement = document.getElementById("countdown");


let countdownDuration = 600;

// Function to update the countdown timer display
function updateCountdown() {
    const minutes = Math.floor(countdownDuration / 60);
    const seconds = countdownDuration % 60;
    countdownElement.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
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

const sentences = document.querySelectorAll('.slideshow-section p');
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
    
});