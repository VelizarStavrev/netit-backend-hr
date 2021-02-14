// Initial test
console.log('Login page script load success.');

// Event listeners
function addEventListeners() {
    
    // Get elements
    let loginBtn = document.getElementById('loginBtn');

    // Set listeners
    loginBtn.addEventListener('click', () => btnClickFunc());
}

// Functions
function btnClickFunc() {

    // Get elements
    let email = document.querySelector(`#inputOne input`).value;
    let password = document.querySelector(`#inputTwo input`).value;
    let errorField = document.querySelector(`#inputOne .errorText`);

    if (email.length < 1 || password.length < 1) {

        errorField.innerHTML = 'A FIELD IS BLANK!';
        errorField.style.display = 'initial';
        return;
    }

    // TO DO
    // FIX TO WORK WITH SERVER RESPONSE
    // errorField.style.display = 'initial';
}

addEventListeners();
