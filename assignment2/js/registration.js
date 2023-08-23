
function validate() {
    const loginInput = document.getElementById('username');
    const passInput = document.getElementById('password');
    const pass2Input = document.getElementById('pass2');
    const termsInput = document.getElementById('terms');
  
    const loginMaxLength = 20;
    const passMinLength = 6;
  
    let isValid = true;
  
    // Clear previous error messages and highlighting
    clearErrors();
  
    if (loginInput.value.trim() === '' || loginInput.value.length >= 20) {
      isValid = false;
      showError(loginInput, 'Username should be non-empty, and within 20 characters long.');
    } else if (loginInput.value.length > loginMaxLength) {
      isValid = false;
      showError(loginInput, 'Username should be non-empty, and within 20 characters long.');
    }
  
    if (passInput.value.length < passMinLength) {
      isValid = false;
      showError(passInput, 'Password should be at least 6 characters:1 uppercase, 1 lowercase.');
    } else if (!/(?=.*[a-z])(?=.*[A-Z])/.test(passInput.value)) {
      isValid = false;
      showError(passInput, 'Password should be at least 6 characters:1 uppercase, 1 lowercase.');
    }
  
    if (passInput.value !== pass2Input.value) {
      isValid = false;
      showError(pass2Input, 'Please retype password.');
    } else if (pass2Input.value.trim() === '') {
    isValid = false;
      showError(pass2Input, 'Please retype password.');
    }

    if (!termsInput.checked) {
      isValid = false;
      showError(termsInput, 'Please accept the terms and conditions.');
    }

    return isValid;
  }
  
  function showError(inputField, message) {
    const errorContainer = document.createElement('div');
    errorContainer.classList.add('error-container');
  
    const errorMessage = document.createElement('span');
    errorMessage.classList.add('error');
    errorMessage.textContent = message;
  
    const errorCross = document.createElement('span');
    errorCross.classList.add('error-cross');
    errorCross.textContent = '✖';
  
    errorContainer.appendChild(errorCross);
    errorContainer.appendChild(errorMessage);
    inputField.parentNode.appendChild(errorContainer);
    inputField.style.borderColor = 'red';
  }
  
  function clearErrors() {
    // Remove all error messages and reset input field borders
    const errorContainers = document.querySelectorAll('.error-container');
    errorContainers.forEach((errorContainer) => errorContainer.remove());
  
    const inputFields = document.querySelectorAll('input');
    inputFields.forEach((inputField) => (inputField.style.borderColor = ''));
  }
  
  // Reset border color and remove error messages when input field is changed
  document.querySelectorAll('input').forEach((input) => {
    input.addEventListener('input', function ()
    {
      this.style.borderColor = '';
      const errorContainers = this.parentNode.querySelectorAll('.error-container');
      errorContainers.forEach((errorContainer) => errorContainer.remove());
    });
  });
  
  // Function to handle form submission
function handleFormSubmit(event) {
  debugger;
  event.preventDefault(); // Prevent the default form submission behavior

  if (validate()) {
      // Registration is successful, submit the form
      document.getElementById('reg-form').submit();
  }
}

// Add event listener to the form submit button
document.getElementById("signup-button").addEventListener("click", handleFormSubmit);