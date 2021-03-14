// Initial test
console.log('Main page script load success.');

// Event listeners
function addEventListeners() {

    // Get elements
    let filterBtn = document.getElementById('filterButton');
    let sortBtn = document.getElementById('sortButton');
    let pagination = document.getElementById('pagination');

    // Set listeners
    filterBtn.addEventListener('change', () => filterFunc());
    sortBtn.addEventListener('change', () => filterFunc());
    pagination.addEventListener('click', (e) => paginationFunc(e));
}

// Functions
function filterFunc(paginationClicked) {

    // Get values
    let checkboxData = Array.from(document.querySelectorAll("input[type=checkbox]:checked")).map(e => e.value);
    let radiobtnData = document.querySelector("input[type=radio]:checked").value;
    let currentPageBtnData = document.querySelector('li.page-item.active button').value;

    // Data to send to server
    const data = [checkboxData, radiobtnData, currentPageBtnData];

    let protocol = window.location.protocol;
    let host = window.location.hostname;

    // Request data
    // fetch(`${protocol}//${host}/netit-backend-hr/php/employer/filters.php`, {
    fetch(`${protocol}//${host}/php/employer/filters.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(jobs => {

            // Testing response
            console.log('Success:', jobs);

            // Get number of results
            let jobCount = jobs.pop();

            // Get container
            let mainContent = document.getElementById('mainContent'); // get main div
            mainContent.innerHTML = ''; // clear old data

            // Display every job
            for (let job of jobs) {

                let salary = 'Not Specified';

                if (job['salary']) {
                    salary = job['salary'];
                }

                // Create elemens
                let a = document.createElement('a');
                let div = document.createElement('div');

                let pFirst = document.createElement('p');
                pFirst.textContent = job['title'];

                let pSecond = document.createElement('p');
                pSecond.textContent = `Location: ${job['country']}, ${job['city']}, ${job['location']}, Salary: ${salary}`;

                let img = document.createElement('img');

                // Set attributes
                a.setAttribute('href', `./job.php?id=${job['id']}`);
                a.setAttribute('class', 'list-group-item list-group-item-action d-flex align-items-center');

                div.setAttribute('class', 'w-100');

                pFirst.setAttribute('class', 'fw-bold fs-4 mb-1');
                pSecond.setAttribute('class', 'fs-5 mb-0');

                img.setAttribute('src', `https://www.treehugger.com/thmb/aW3Ql9fQ-V1QxUSI7_5iN0o9Dlk=/750x750/smart/filters:no_upscale()/__opt__aboutcom__coeus__resources__content_migration__mnn__images__2017__05__lady-bug-on-leaf-e3cd36cdc3024129b61926ddf6ef386e.jpg`);
                img.setAttribute('alt', 'companyimage');
                img.setAttribute('class', 'ps-3');
                img.style.width = "90px";

                div.appendChild(pFirst);
                div.appendChild(pSecond);
                a.appendChild(div);
                a.appendChild(img);
                mainContent.appendChild(a);
            }

            if (!paginationClicked) {

                // Fix pagination
                let pagination = document.getElementById('pagination'); // get main div
    
                let pages = Math.ceil(jobCount / 5);
                pagination.innerHTML = ''; // clear old data
    
                if (pages > 1) {
    
                    for (let i = 0; i < pages; i++) {
    
                        let currentpage = i + 1;
    
                        if (currentpage == 1) {
    
                            // Create elemens
                            let li = document.createElement('li');
                            let btn = document.createElement('button');
    
                            li.setAttribute('class', 'page-item active');
                            btn.setAttribute('class', 'page-link');
                            btn.setAttribute('value', `page${currentpage}`);
                            btn.textContent = currentpage;
    
                            li.appendChild(btn);
                            pagination.appendChild(li);
    
                        } else {
    
                            // Create elemens
                            let li = document.createElement('li');
                            let btn = document.createElement('button');
    
                            li.setAttribute('class', 'page-item');
                            btn.setAttribute('class', 'page-link');
                            btn.setAttribute('value', `page${currentpage}`);
                            btn.textContent = currentpage;
    
                            li.appendChild(btn);
                            pagination.appendChild(li);
    
                        }
                    }
    
                } else {
    
                    // Create elemens
                    let li = document.createElement('li');
                    let btn = document.createElement('button');
    
                    li.setAttribute('class', 'page-item active');
                    btn.setAttribute('class', 'page-link');
                    btn.setAttribute('value', `page1`);
                    btn.textContent = 1;
    
                    li.appendChild(btn);
                    pagination.appendChild(li);
                }
            }
        })
        .catch((error) => {
            console.log('Error:', error);
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
