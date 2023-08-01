// Function to validate the form
function validate() {
  // Get form elements
  const emailInput = document.getElementById("email");
  const loginInput = document.getElementById("login");
  const passInput = document.getElementById("pass");
  const pass2Input = document.getElementById("pass2");
  const newsletterInput = document.getElementById("newsletter");
  const termsInput = document.getElementById("terms");

  // Clear any previous error messages and styles before submit form again
  const errorMessages = document.querySelectorAll(".error-message");
  errorMessages.forEach((msg) => msg.remove());

  const errorFields = document.querySelectorAll(".error");
  errorFields.forEach((field) => field.classList.remove("error"));

  // Initialize the flag to check for form validity
  let isValid = true;

  // Email validation
  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
  if (!emailRegex.test(emailInput.value)) {
    isValid = false;
    showError(emailInput, "x Email address should be non-empty with the format xyx@xyz.xyz.");
  }

  // Login name validation:
  // Remove leading and trailing whitespace; Check for an empty input
  if (loginInput.value.trim() === "" || loginInput.value.length >= 20) {
    isValid = false;
    showError(loginInput, "x User name should not be non-empty and within 20 characters long.");
  } else {
    // Convert login name to lowercase alphabetic characters
    loginInput.value = loginInput.value.toLowerCase();
  }

  // Password validation
  if (passInput.value.length < 6 || !/[a-z]/.test(passInput.value) || !/[A-Z]/.test(passInput.value)) {
    isValid = false;
    showError(passInput, "x Password should be at least 6 characters long, with 1 uppercase letter and 1 lowercase letter.");
  }

  // Match passwords
  if (passInput.value !== pass2Input.value || passInput.value.trim() === "") {
    isValid = false;
    showError(pass2Input, "x Please retype password");
  }

  // Newsletter alert
  if (newsletterInput.checked) {
    alert("Be aware of possible spam by signing up for the newsletter.");
  }

  // Terms and conditions validation
  if (!termsInput.checked) {
    isValid = false;
    showError(termsInput, "x Please accept the terms and conditions.");
  }

  // If the form is valid, redirect to the same page with the submitted data in the URL
  if (isValid) {
  // Create the query string from form elements
    const queryString = createQueryString(emailInput, loginInput, newsletterInput, termsInput);

  // Redirect to the same page with the query string
    window.location.href = window.location.pathname + "?" + queryString;
    // Show alert for successful form submission
    alert("Form submitted successfully!");
  }

  // Prevent default form submission regardless of validity
  return false;
}

// Function to create the query string from form elements
function createQueryString(emailInput, loginInput, newsletterInput, termsInput) {
  const queryString = `email=${encodeURIComponent(emailInput.value)}&login=${encodeURIComponent(loginInput.value)}&newsletter=${newsletterInput.checked}&terms=${termsInput.checked}`;
  return queryString;
}

// Function to show error message and style the input field
function showError(inputElement, errorMessage) {
  const errorElement = document.createElement("p");
  errorElement.textContent = errorMessage;  //actual message to display
  errorElement.className = "error-message"; //for css styling

  // If the inputElement is a checkbox, find the label and insert the error after it.
  if (inputElement.type === "checkbox") {
    const label = inputElement.parentNode.querySelector("label[for='" + inputElement.id + "']");
    label.parentNode.insertBefore(errorElement, label.nextSibling);
  } else { 
  // For textfield insert the error after the input element.
    inputElement.classList.add("error");
    inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
  }
  
}

//The resulting query string can be appended to the URL to send the data to the server.
//encodeURIComponent ensure that any special characters in the input values are properly handled and won't interfere with the URL format.