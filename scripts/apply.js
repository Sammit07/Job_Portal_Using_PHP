/*** 
* Author: Sammit Rajaram Raut 104691259
* Target: apply.html
* Purpose: Assignment1 part2
* Created: 20-09-2023
* last updated: 29-09-2023
*/
let debug = true;
function storePositionReference(positionRef) {
    sessionStorage.setItem('positionReference', positionRef);
  
    // Display the updated job reference immediately
    updateJobReferenceInput(positionRef);
  }
  
  function updateJobReferenceInput(positionRef) {
    const jobReferenceInput = document.getElementById("jobReference");
    if (!jobReferenceInput.value) {
      jobReferenceInput.value = positionRef;
    }
  }
  
  // Function to retrieve and display the job reference from session storage
  function displayJobReference() {
    const storedPositionReference = sessionStorage.getItem("positionReference");
    const jobReferenceInput = document.getElementById("jobReference");
    if (jobReferenceInput && storedPositionReference) {
      updateJobReferenceInput(storedPositionReference);
    }
  }
  
  // Initialize the page (call this when apply.html loads)
  function init() {
    displayJobReference();
  }
   
  if (!debug) {
    // Validation function calls go here
    Validate()
  }
   

// Add an event listener to ensure the init function is called when the DOM is ready
document.addEventListener("DOMContentLoaded", function() {
    if (!debug) {
    init();

    // Retrieve the form element
    const form = document.querySelector("form");

    // Retrieve and pre-fill form data from session storage if it exists
    const jobReferenceInput = document.getElementById("jobReference");






// Loop through form elements and retrieve stored data from sessionStorage
const formElements = form.elements;
for (const element of formElements) {
    if (element.tagName === "INPUT" || element.tagName === "SELECT" || element.tagName === "TEXTAREA") {
        if (element.type === "checkbox") {
            // For checkboxes, convert the stored string back to boolean
            const storedValue = sessionStorage.getItem(element.id);
            if (storedValue === "true") {
                element.checked = true;
            } else if (storedValue === "false") {
                element.checked = false;
            }
        } else if (element.type === "radio" && element.name === "gender") {
            // For radio buttons (e.g., "gender"), set the checked state based on stored value
            const storedValue = sessionStorage.getItem(element.name);
            if (storedValue === element.value) {
                element.checked = true;
            }
        } else if (element.id !== "jobReference") {
            // Exclude the "jobReference" field
            const storedValue = sessionStorage.getItem(element.id);
            if (storedValue !== null) {
                element.value = storedValue;
            }
        }
    }
}




    
    const applyButtons = document.querySelectorAll(".apply-button");
    applyButtons.forEach(button => {
        button.addEventListener("click", function() {
            const positionRef = this.getAttribute("data-position-ref");
            storePositionReference(positionRef);
        });
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let valid = true;

        // Reset previous error messages
        const errorMessages = document.querySelectorAll(".error-message");
        errorMessages.forEach((errorMessage) => {
            errorMessage.textContent = "";
        });

        //validation logic 
        const dobInput = document.getElementById("dob");
        const dobPattern = /^\d{1,2}\/(0[1-9]|1[0-2])\/\d{4}$/;
        const dobValue = dobInput.value;
        console.log('Date of Birth validation function called'); 
        if (!dobPattern.test(dobValue)) {
            valid = false;
            displayErrorMessage(dobInput, "Please enter a valid date of birth in dd/mm/yyyy format.");
        } else {
            const dobParts = dobValue.split("/");
            const dobDate = new Date(dobParts[2], dobParts[1] - 1, dobParts[0]);
            const currentDate = new Date();
            const minAgeDate = new Date(currentDate.getFullYear() - 80, currentDate.getMonth(), currentDate.getDate());
            const maxAgeDate = new Date(currentDate.getFullYear() - 15, currentDate.getMonth(), currentDate.getDate());
            if (dobDate < minAgeDate || dobDate > maxAgeDate) {
                valid = false;
                displayErrorMessage(dobInput, "Applicants must be between 15 and 80 years old.");
            }
        }

        // State and Postcode validation
        const stateInput = document.getElementById("state");
        const postcodeInput = document.getElementById("postcode");
        const stateValue = stateInput.value;
        const postcodeValue = postcodeInput.value;
        const postcodeFirstDigit = parseInt(postcodeValue.charAt(0));
        if (
            (stateValue === "VIC" && ![3, 8].includes(postcodeFirstDigit)) ||
            (stateValue === "NSW" && ![1, 2].includes(postcodeFirstDigit)) ||
            (stateValue === "QLD" && ![4, 9].includes(postcodeFirstDigit)) ||
            (stateValue === "NT" && postcodeFirstDigit !== 0) ||
            (stateValue === "WA" && postcodeFirstDigit !== 6) ||
            (stateValue === "SA" && postcodeFirstDigit !== 5) ||
            (stateValue === "TAS" && postcodeFirstDigit !== 7) ||
            (stateValue === "ACT" && postcodeFirstDigit !== 0)
        ) {
            valid = false;
            displayErrorMessage(stateInput, "The selected state does not match the first digit of the postcode.");
        }

        // Other Skills validation
        const otherSkillsTextarea = document.getElementById("additionalSkills");
        const otherSkillsCheckbox = document.getElementById("otherSkills");
        if (otherSkillsCheckbox.checked && otherSkillsTextarea.value.trim() === "") {
            valid = false;
            displayErrorMessage(otherSkillsTextarea, "Please tell us about your skills.");
        }

        // Store form data in session storage
        if (valid) {
            for (const element of formElements) {
                if (element.tagName === "INPUT" || element.tagName === "SELECT" || element.tagName === "TEXTAREA") {
                    if (element.type === "checkbox") {
                        // For checkboxes, store whether they are checked or not
                        sessionStorage.setItem(element.id, element.checked.toString());
                    } else if (element.type === "radio" && element.name === "gender") {
                        // For radio buttons (e.g., "gender"), store the selected value
                        if (element.checked) {
                            sessionStorage.setItem(element.name, element.value);
                        }
                    } else if (element.id !== "jobReference") {
                        // Exclude the "jobReference" field
                        sessionStorage.setItem(element.id, element.value);
                    }
                }
            }
        

            

            // Submit the form
            form.submit();
        } else {
            // Prevent form submission if validation fails
            e.preventDefault();
        }
    });

    // Function to display error message
    function displayErrorMessage(inputElement, message) {
        // Create a new error message element
        const errorMessage = document.createElement("p");
        errorMessage.textContent = message;
        errorMessage.classList.add("error-message");

        // Check if there is already an error message for this input
        const existingErrorMessage = inputElement.nextElementSibling;

        // If there's an existing error message, replace it; otherwise, add the new one
        if (existingErrorMessage && existingErrorMessage.classList.contains("error-message")) {
            existingErrorMessage.textContent = message;
        } else {
            inputElement.parentNode.insertBefore(errorMessage, inputElement.nextSibling);
        }
    }}
});