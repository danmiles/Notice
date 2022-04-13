/**
 * Easy selector helper function
 */
const select = (el, all = false) => {
    el = el.trim();
    if (all) {
        return [...document.querySelectorAll(el)];
    } else {
        return document.querySelector(el);
    }
};

/**
 * Easy event listener function
 */
const on = (type, el, listener, all = false) => {
    if (all) {
        select(el, all).forEach((e) => e.addEventListener(type, listener));
    } else {
        select(el, all).addEventListener(type, listener);
    }
};

/**
 * Easy on scroll event listener
 */
const onscroll = (el, listener) => {
    el.addEventListener("scroll", listener);
};

/**
 * Navbar links active state on scroll
 */
let navbarlinks = select("#navbar .scrollto", true);
const navbarlinksActive = () => {
    let position = window.scrollY + 200;
    navbarlinks.forEach((navbarlink) => {
        if (!navbarlink.hash) return;
        let section = select(navbarlink.hash);
        if (!section) return;
        if (
            position >= section.offsetTop &&
            position <= section.offsetTop + section.offsetHeight
        ) {
            navbarlink.classList.add("active");
        } else {
            navbarlink.classList.remove("active");
        }
    });
};
window.addEventListener("load", navbarlinksActive);
onscroll(document, navbarlinksActive);

/**
 * Scrolls to an element with header offset
 */
const scrollto = (el) => {
    let header = select("#header");
    let offset = header.offsetHeight;

    if (!header.classList.contains("header-scrolled")) {
        offset -= 10;
    }

    let elementPos = select(el).offsetTop;
    window.scrollTo({
        top: elementPos - offset,
        behavior: "smooth",
    });
};

/**
 * Toggle .header-scrolled class to #header when page is scrolled
 */
let selectHeader = select("#header");
if (selectHeader) {
    const headerScrolled = () => {
        if (window.scrollY > 100) {
            selectHeader.classList.add("header-scrolled");
        } else {
            selectHeader.classList.remove("header-scrolled");
        }
    };
    window.addEventListener("load", headerScrolled);
    onscroll(document, headerScrolled);
}

/**
 * Mobile nav toggle
 */
on("click", ".mobile-nav-toggle", function (e) {
    select("#navbar").classList.toggle("navbar-mobile");
    this.classList.toggle("bx-list-plus");
    this.classList.toggle("bx-list-minus");
});

/**
 * Mobile nav dropdowns activate
 */
on(
    "click",
    ".navbar .dropdown > a",
    function (e) {
        if (select("#navbar").classList.contains("navbar-mobile")) {
            e.preventDefault();
            this.nextElementSibling.classList.toggle("dropdown-active");
        }
    },
    true
);



/**
 * Scrool with ofset on links with a class name .scrollto
 */
// on(
//     "click",
//     ".scrollto",
//     function (e) {
//         if (select(this.hash)) {
//             e.preventDefault();

//             let navbar = select("#navbar");
//             if (navbar.classList.contains("navbar-mobile")) {
//                 navbar.classList.remove("navbar-mobile");
//                 let navbarToggle = select(".mobile-nav-toggle");
//                 navbarToggle.classList.toggle("bx-list-plus");
//                 navbarToggle.classList.toggle("bx-list-minus");
//             }
//             scrollto(this.hash);
//         }
//     },
//     true
// );

/**
 * Scroll with ofset on page load with hash links in the url
 */
// window.addEventListener("load", () => {
//     if (window.location.hash) {
//         if (select(window.location.hash)) {
//             scrollto(window.location.hash);
//         }
//     }
// });

/**
 * Animation on scroll
 * 
 */
// function aos_init() {
//     AOS.init({
//         duration: 1000,
//         easing: "ease-in-out",
//         once: true,
//         mirror: false,
//     });
// }
// window.addEventListener("load", () => {
//     aos_init();
// });

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

