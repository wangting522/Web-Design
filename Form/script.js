const name = document.getElementById('name')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')
//e is the short var reference for event object which will be passed to event handlers
form.addEventListener('submit', (e) => {
let messages = []
if (name.value === '' || name.value == null) {
messages.push('Name is required')
}
if (password.value.length <= 6) {
messages.push('Password must be longer than 6 characters')
}
if (password.value.length >= 20) {
messages.push('Password must be less than 20 characters')
}
if (password.value === 'password') {
messages.push('Password cannot be password')
}
if (messages.length > 0) {
e.preventDefault()
errorElement.innerText = messages.join(', ')
}
})
// this code block checks if there are any validation errors. If errors exist, it prevents the form from being submitted, 
// and displays the error messages in the specified errorElement on the webpage.