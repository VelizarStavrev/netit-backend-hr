// Initial test
console.log('Profile page script load success.');

// Event listeners
function addEventListeners() {

    // Get elements
    let backBtn = document.getElementById('backBtn');

    // Set listeners
    backBtn.addEventListener('click', () => btnBackFunc());
}

// Functions
function btnBackFunc() {

    window.history.back();
}

addEventListeners();
