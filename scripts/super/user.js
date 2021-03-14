// Initial test
console.log('User page script load success.');

// Event listeners
function addEventListeners() {

    // Get elements
    let inputStatus = document.getElementById('inputStatus');

    // Set listeners
    inputStatus.addEventListener('change', () => updateStatus(inputStatus.value));
}

// Functions
function updateStatus(role) {

    // Prepare data
    let searchQuery = window.location.search;
    let jobid = searchQuery.replace('?id=', '');

    let data = [role, jobid];

    let protocol = window.location.protocol;
    let host = window.location.hostname;

    // Send data
    // fetch(`${protocol}//${host}/netit-backend-hr/php/super/updateRole.php`, {
    fetch(`${protocol}//${host}/php/super/updateRole.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(res => {

            // console.log(res);

        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

addEventListeners();
