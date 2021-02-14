// Initial test
console.log('Register page script load success.');

// Event listeners
function addEventListeners() {

    // Get elements
    // Employee
    let employeeRBTN = document.getElementById('employeeRBTN');
    let btnOneEmployee = document.getElementById('regBtnOneEmployee');
    let btnTwoEmployee = document.getElementById('regBtnTwoEmployee');
    let btnThreeEmployee = document.getElementById('regBtnThreeEmployee');
    let btnBackTwoEmployee = document.getElementById('regBtnBackTwoEmployee');
    let btnBackThreeEmployee = document.getElementById('regBtnBackThreeEmployee');

    // Employer
    let employerRBTN = document.getElementById('employerRBTN');
    let btnOneEmployer = document.getElementById('regBtnOneEmployer');
    let btnTwoEmployer = document.getElementById('regBtnTwoEmployer');
    let btnThreeEmployer = document.getElementById('regBtnThreeEmployer');
    let btnBackTwoEmployer = document.getElementById('regBtnBackTwoEmployer');
    let btnBackThreeEmployer = document.getElementById('regBtnBackThreeEmployer');

    // Set listeners
    // Employee
    employeeRBTN.addEventListener('click', () => btnClickFunc('employee', 'changeForm', 'toEmployee'));
    btnOneEmployee.addEventListener('click', () => btnClickFunc('employee', 'formBtn', 'nextOne'));
    btnTwoEmployee.addEventListener('click', () => btnClickFunc('employee', 'formBtn', 'nextTwo'));
    btnThreeEmployee.addEventListener('click', () => btnClickFunc('employee', 'formBtn', 'nextThree'));
    btnBackTwoEmployee.addEventListener('click', () => btnClickFunc('employee', 'formBtn', 'backTwo'));
    btnBackThreeEmployee.addEventListener('click', () => btnClickFunc('employee', 'formBtn', 'backThree'));

    // Employer
    employerRBTN.addEventListener('click', () => btnClickFunc('employer', 'changeForm', 'toEmployer'));
    btnOneEmployer.addEventListener('click', () => btnClickFunc('employer', 'formBtn', 'nextOne'));
    btnTwoEmployer.addEventListener('click', () => btnClickFunc('employer', 'formBtn', 'nextTwo'));
    btnThreeEmployer.addEventListener('click', () => btnClickFunc('employer', 'formBtn', 'nextThree'));
    btnBackTwoEmployer.addEventListener('click', () => btnClickFunc('employer', 'formBtn', 'backTwo'));
    btnBackThreeEmployer.addEventListener('click', () => btnClickFunc('employer', 'formBtn', 'backThree'));
}

// On button click for forms
function btnClickFunc(form, action, direction) {

    // Form change on radio button click
    if (action == 'changeForm') {

        // Get elements
        let formEmployee = document.getElementById('formEmployee');
        let employeeRBTN = document.getElementById('employeeRBTN');
        let formEmployer = document.getElementById('formEmployer');
        let employerRBTN = document.getElementById('employerRBTN');

        if (direction == 'toEmployer') {

            formEmployee.style.display = 'none';
            formEmployer.style.display = 'initial';
            employerRBTN.checked = true;
            employeeRBTN.checked = false;

        } else {

            formEmployee.style.display = 'initial';
            formEmployer.style.display = 'none';
            employeeRBTN.checked = true;
            employerRBTN.checked = false;
        }

    } else { // Form button click

        let formFirst;
        let formSecond;
        let formThird;

        if (form == 'employee') {

            // Get elements
            formFirst = document.getElementById('formEmployeeFirst');
            formSecond = document.getElementById('formEmployeeSecond');
            formThird = document.getElementById('formEmployeeThird');
        } else {

            // Get elements
            formFirst = document.getElementById('formEmployerFirst');
            formSecond = document.getElementById('formEmployerSecond');
            formThird = document.getElementById('formEmployerThird');
        }

        // Change display
        switch (direction) {
            case 'nextOne':

                if (fieldValidation(form, 'nextOne')) {
                    return;
                }

                clearFields(form, 'nextOne');

                formFirst.style.display = 'none';
                formSecond.style.display = 'initial';
                break;

            case 'nextTwo':

                if (fieldValidation(form, 'nextTwo')) {
                    return;
                }

                clearFields(form, 'nextTwo');

                formSecond.style.display = 'none';
                formThird.style.display = 'initial';
                break;

            case 'nextThree':

                if (fieldValidation(form, 'nextThree')) {
                    return;
                }

                clearFields(form, 'nextTwo');

                // window.location.href = './login.html';
                break;

            case 'backTwo':
                formFirst.style.display = 'initial';
                formSecond.style.display = 'none';
                break;

            case 'backThree':
                formSecond.style.display = 'initial';
                formThird.style.display = 'none';
                break;
        }
    }

}

function fieldValidation(form, section) {

    let formType;

    let inputOne; // E-mail
    let inputTwo; // Username
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

    if (form == 'employee') {
        formType = 'Employee';
    } else { // employer
        formType = 'Employer';
    }

    switch (section) {
        case 'nextOne':
            inputOne = emailValidation(document.querySelector(`#${'inputOne' + formType} input`).value);
            inputTwo = document.querySelector(`#${'inputTwo' + formType} input`).value.length < 2;
            inputThree = passwordValidation(document.querySelector(`#${'inputThree' + formType} input`).value);
            inputFour = passwordComparison(document.querySelector(`#${'inputThree' + formType} input`).value, document.querySelector(`#${'inputFour' + formType} input`).value);

            if (inputOne || inputTwo || inputThree || inputFour) {
                inputOne ? document.querySelector(`#${'inputOne' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputOne' + formType} .errorText`).style.display = 'none';
                inputTwo ? document.querySelector(`#${'inputTwo' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputTwo' + formType} .errorText`).style.display = 'none';
                inputThree ? document.querySelector(`#${'inputThree' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputThree' + formType} .errorText`).style.display = 'none';
                inputFour ? document.querySelector(`#${'inputFour' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputFour' + formType} .errorText`).style.display = 'none';
                return true;
            }
            break;

        case 'nextTwo':
            inputFive = document.querySelector(`#${'inputFive' + formType} input`).value == '' ? true : false;
            inputSix = document.querySelector(`#${'inputSix' + formType} input`).value == '' ? true : false;
            inputSeven = document.querySelector(`#${'inputSeven' + formType} input`).value == '' ? true : false;
            inputEight = document.querySelector(`#${'inputEight' + formType} input`).value == '' ? true : false;

            if (inputFive || inputSix || inputSeven || inputEight) {
                inputFive ? document.querySelector(`#${'inputFive' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputFive' + formType} .errorText`).style.display = 'none';
                inputSix ? document.querySelector(`#${'inputSix' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputSix' + formType} .errorText`).style.display = 'none';
                inputSeven ? document.querySelector(`#${'inputSeven' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputSeven' + formType} .errorText`).style.display = 'none';
                inputEight ? document.querySelector(`#${'inputEight' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputEight' + formType} .errorText`).style.display = 'none';
                return true;
            }
            break;

        case 'nextThree':
            formType == 'Employee' ? (inputNine = emailValidation(document.querySelector(`#${'inputNine' + formType} input`).value)) : (inputNine = document.querySelector(`#${'inputNine' + formType} textarea`).value == '' ? true : false);
            inputTen = document.querySelector(`#${'inputTen' + formType} input`).value == '' ? true : false;
            inputEleven = document.querySelector(`#${'inputEleven' + formType} input`).value == '' ? true : false;
            formType == 'Employee' ? (inputTwelve = document.querySelector(`#${'inputTwelve' + formType} input`).value == '' ? true : false) : inputTwelve = false;

            if (inputNine || inputTen || inputEleven || inputTwelve) {
                inputNine ? document.querySelector(`#${'inputNine' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputNine' + formType} .errorText`).style.display = 'none';
                inputTen ? document.querySelector(`#${'inputTen' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputTen' + formType} .errorText`).style.display = 'none';
                inputEleven ? document.querySelector(`#${'inputEleven' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputEleven' + formType} .errorText`).style.display = 'none';
                formType == 'Employee' ? (inputTwelve ? document.querySelector(`#${'inputTwelve' + formType} .errorText`).style.display = 'initial' : document.querySelector(`#${'inputTwelve' + formType} .errorText`).style.display = 'none') : '';
                return true;
            }
            break;
    }
}

function emailValidation(email) {

    // RegEx
    const emailValidationParameters = /^[^._][a-zA-Z0-9]*[_.]*[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,}$/g;
    let emailValidationResult = emailValidationParameters.test(email);

    // Test
    // let currentValidation = email.match(emailValidationParameters);
    // console.log(currentValidation);

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

    if (form == 'employee') {
        formType = 'Employee';
    } else { // employer
        formType = 'Employer';
    }

    switch (section) {
        case 'nextOne':
            
            document.querySelector(`#${'inputOne' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputTwo' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputThree' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputFour' + formType} .errorText`).style.display = 'none';
            break;

        case 'nextTwo':
            
            document.querySelector(`#${'inputFive' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputSix' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputSeven' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputEight' + formType} .errorText`).style.display = 'none';
            break;

        case 'nextThree':
            
            document.querySelector(`#${'inputNine' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputTen' + formType} .errorText`).style.display = 'none';
            document.querySelector(`#${'inputEleven' + formType} .errorText`).style.display = 'none';
            formType == 'Employee' ? document.querySelector(`#${'inputTwelve' + formType} .errorText`).style.display = 'none' : '';
            break;
    }
}

// Execute functions
addEventListeners();
