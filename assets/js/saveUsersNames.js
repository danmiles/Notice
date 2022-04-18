// ================= !!!!!!!!!!!!! Javascript for NOTICE !!!!!!!!!!!!! =================    

// ========= Change Title Start =========
function changeTitle() {
    const originalPageTitle = 'Notice Coding Exercise';
    const newPageTitle = 'The title has changed!';
    const getTitle = document.querySelector('title');

    getTitle.textContent === originalPageTitle ? getTitle.textContent = newPageTitle : getTitle.textContent = originalPageTitle

    // Another variant

    // if (getTitle.textContent === originalPageTitle) {
    //     getTitle.textContent = newPageTitle;
    // } else {
    //     getTitle.textContent = originalPageTitle;
    // }
}
// ========= Change Title End =========

// Save User Name Start

const form = document.getElementById('saveUserName');
const ol = document.getElementById('savedName');
const buttonClear = document.getElementById('clearButton');
const input = document.getElementById('item');
let itemsArray = localStorage.getItem('items') ? JSON.parse(localStorage.getItem('items')) : [];

localStorage.setItem('items', JSON.stringify(itemsArray));
const data = JSON.parse(localStorage.getItem('items'));

const liMaker = (text) => {
    const li = document.createElement('li');
    li.textContent = text;
    ol.appendChild(li);
}

// Save username - press ENTER in the FORM
form.addEventListener('submit', function (e) {
    e.preventDefault();

    itemsArray.push(input.value);
    localStorage.setItem('items', JSON.stringify(itemsArray));
    liMaker(input.value);
    input.value = "";
});

data.forEach(item => {
    liMaker(item);
});

buttonClear.addEventListener('click', function () {
    localStorage.clear();
    while (ol.firstChild) {
        ol.removeChild(ol.firstChild);
    }
    itemsArray = [];
});