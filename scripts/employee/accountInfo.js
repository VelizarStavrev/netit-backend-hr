// Initial test
console.log('Account info page script load success.');

// Event listeners
function addEventListeners() {

    // Get elements
    let btnOneEmployee = document.getElementById('regBtnOneEmployee');
    let btnBackTwoEmployee = document.getElementById('regBtnBackTwoEmployee');

    // Set listeners
    btnOneEmployee.addEventListener('click', () => btnClickFunc('employee', 'formBtn', 'nextOne'));
    btnBackTwoEmployee.addEventListener('click', () => btnClickFunc('employee', 'formBtn', 'backTwo'));
}

// On button click for forms
function btnClickFunc(form, action, direction) {
    
        // Get elements
        let formFirst = document.getElementById('formEmployeeFirst');
        let formSecond = document.getElementById('formEmployeeSecond');

        // Change display
        switch (direction) {
            case 'nextOne':

                if (fieldValidation(form, 'nextOne')) {
                    return;
                }

                clearFields('nextOne');

                formFirst.style.display = 'none';
                formSecond.style.display = 'initial';
                break;

            case 'nextTwo':

                if (fieldValidation(form, 'nextTwo')) {
                    return;
                }

                clearFields('nextTwo');

                formSecond.style.display = 'none';
                formThird.style.display = 'initial';
                break;

            case 'backTwo':
                formFirst.style.display = 'initial';
                formSecond.style.display = 'none';
                break;
        }
}

function fieldValidation(form, section) {

    let formType = 'Employee';

    let inputThree; // Password
    let inputFour; // Repeat Password

    let inputFive; // First Name / Company Name
    let inputSix; // Last Name / Industry
    let inputSeven; // Country
    let inputEight; // City

    let inputNine; // Public E-mail / Desciption
    let inputTen; // Public Phone / Website
    let inputEleven; // Website / LinkedIn
    let inputTwelve; // LinkedIn

    switch (section) {

        case 'nextOne':
            
            inputThree = passwordValidation(document.querySelector(`#${'inputThree' + formType} input`).value);
            inputFour = passwordComparison(document.querySelector(`#${'inputThree' + formType} input`).value, document.querySelector(`#${'inputFour' + formType} input`).value);
            inputNine = emailValidation(document.querySelector(`#${'inputNine' + formType} input`).value);
            inputTen = document.querySelector(`#${'inputTen' + formType} input`).value == '' ? true : false;
            inputEleven = document.querySelector(`#${'inputEleven' + formType} input`).value == '' ? true : false;

            if (inputThree || inputFour || inputNine || inputTen || inputEleven) {
                inputThree ? document.querySelector(`#${'inputThree' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputThree' + formType} .errorText`).style.display = 'none';
                inputFour ? document.querySelector(`#${'inputFour' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputFour' + formType} .errorText`).style.display = 'none';
                inputNine ? document.querySelector(`#${'inputNine' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputNine' + formType} .errorText`).style.display = 'none';
                inputTen ? document.querySelector(`#${'inputTen' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputTen' + formType} .errorText`).style.display = 'none';
                inputEleven ? document.querySelector(`#${'inputEleven' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputEleven' + formType} .errorText`).style.display = 'none';
                return true;
            }
            break;

        case 'nextTwo':

            inputTwelve = document.querySelector(`#${'inputTwelve' + formType} input`).value == '' ? true : false;
            inputFive = document.querySelector(`#${'inputFive' + formType} input`).value == '' ? true : false;
            inputSix = document.querySelector(`#${'inputSix' + formType} input`).value == '' ? true : false;
            inputSeven = document.querySelector(`#${'inputSeven' + formType} input`).value == '' ? true : false;
            inputEight = document.querySelector(`#${'inputEight' + formType} input`).value == '' ? true : false;

            if (inputTwelve || inputFive || inputSix || inputSeven || inputEight) {
                inputTwelve ? document.querySelector(`#${'inputTwelve' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputTwelve' + formType} .errorText`).style.display = 'none';
                inputFive ? document.querySelector(`#${'inputFive' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputFive' + formType} .errorText`).style.display = 'none';
                inputSix ? document.querySelector(`#${'inputSix' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputSix' + formType} .errorText`).style.display = 'none';
                inputSeven ? document.querySelector(`#${'inputSeven' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputSeven' + formType} .errorText`).style.display = 'none';
                inputEight ? document.querySelector(`#${'inputEight' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputEight' + formType} .errorText`).style.display = 'none';
                return true;
            }
            break;
    }
}

function emailValidation(email) {

    // RegEx
    const emailValidationParameters = /^[^._][a-zA-Z0-9]*[_.]*[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,}$/g;
    let emailValidationResult = emailValidationParameters.test(email);

    return !emailValidationResult;
}

function passwordValidation(password) {

    // RegEx
    const passwordValidationParameters = /^[\w!_.?$#%]{6,}$/g;
    let passwordValidationResult = passwordValidationParameters.test(password);

    return !passwordValidationResult;
}

function passwordComparison(password, repassword) {

    if (password.length <= 0 || password.length < 6) {
        return false;
    }

    result = (password == repassword);
    return !result;
}

function clearFields(form, section) {

    let formType = 'Employee';

    switch (section) {

        case 'nextOne':
            
            document.querySelector(`#${'inputThree' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputFour' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputNine' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputTen' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputEleven' + formType} .errorText`).style.display = 'none';
            break;

        case 'nextTwo':
            
            document.querySelector(`#${'inputTwelve' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputFive' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputSix' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputSeven' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputEight' + formType} .errorText`).style.display = 'none';
            break;
    }
}

// Execute functions
addEventListeners();
