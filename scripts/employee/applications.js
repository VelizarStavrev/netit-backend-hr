// Initial test
console.log('Applications page script load success.');

// Event listeners
function addEventListeners() {

    // Get elements
    let pagination = document.getElementById('pagination');

    // Set listeners
    pagination.addEventListener('click', (e) => paginationFunc(e));
}

// Functions
function filterFunc() {

    // Get values
    let currentPageBtnData = document.querySelector('li.page-item.active button').value;

    // Data to send to server
    let jobid = window.location.search;
    jobid = Number(jobid.substring(4));
    const data = [jobid, currentPageBtnData];

    let protocol = window.location.protocol;
    let host = window.location.hostname;

    // Request data
    // fetch(`${protocol}//${host}/netit-backend-hr/php/employee/applications.php`, {
    fetch(`${protocol}//${host}/php/employee/applications.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(applications => {

            // Testing response
            // console.log('Success:', applications);

            // Get container
            let mainContent = document.getElementById('mainContent'); // get main div
            let header = mainContent['firstElementChild'].cloneNode(true); // get header
            let hr = document.createElement('hr'); // get hr

            mainContent.innerHTML = ''; // clear old data

            mainContent.appendChild(header);
            mainContent.appendChild(hr);

            // Display every application
            for (let application of applications) {

                // Create elemens
                let li = document.createElement('li');
                let div = document.createElement('div');

                let pFirst = document.createElement('p');
                pFirst.textContent = `${application['title'].toUpperCase()}`;

                let pSecond = document.createElement('p');
                pSecond.textContent = `STATUS: ${application['status'].toUpperCase()}`;

                let img = document.createElement('img');

                // Set attributes
                li.setAttribute('class', 'list-group-item list-group-item-action d-flex align-items-center');

                div.setAttribute('class', 'w-100');

                pFirst.setAttribute('class', 'fw-bold fs-4 mb-1');
                pSecond.setAttribute('class', 'fs-5 mb-0');

                img.setAttribute('src', `https://www.treehugger.com/thmb/aW3Ql9fQ-V1QxUSI7_5iN0o9Dlk=/750x750/smart/filters:no_upscale()/__opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__05__lady-bug-on-leaf-e3cd36cdc3024129b61926ddf6ef386e.jpg`);
                img.setAttribute('alt', 'companyimage');
                img.setAttribute('class', 'ps-3');
                img.style.width = "90px";

                div.appendChild(pFirst);
                div.appendChild(pSecond);
                li.appendChild(div);
                li.appendChild(img);
                mainContent.appendChild(li);
            }
        })
        .catch((error) => {

            // TO DO
            // Fix the log, it shows an error
            // console.error('Error:', error, 'End');
        });
}

function paginationFunc(e) {

    // Remove old active
    let oldActiveBtn = document.querySelector('li.page-item.active');
    oldActiveBtn.classList.remove('active');

    // Add new active
    clickedPage = e.target;
    clickedPage.parentElement.classList.add('active');

    filterFunc(true);
}

addEventListeners();
