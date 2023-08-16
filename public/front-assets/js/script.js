// mobile menu
const menuButton = document.querySelector('.menu-button');
const menu = document.querySelector('header .menu');
menuButton.addEventListener('click', () => {
    menuButton.classList.toggle('active');
    menu.classList.toggle('active');
})

// page scroll button
let pageScrollButton = document.querySelector(".page-scroll-button");
window.addEventListener("scroll", function () {
    if (scrollY > 300) {
        pageScrollButton.classList.remove("d-none");
    } else {
        pageScrollButton.classList.add("d-none")
    }
});
pageScrollButton.addEventListener("click", function () {
    window.scrollTo(0, 0);
})
// fix header
let header = document.querySelector('header');
window.addEventListener('scroll', function () {
    if (scrollY > 300) {
        header.classList.add('fixed-top');
    } else {
        header.classList.remove('fixed-top');
    }
})

// file input
if (document.querySelector(".file-input")) {

    let fileInput = document.querySelectorAll(".file-input input");
    let fileButton = document.querySelectorAll(".file-input button");
    let fileSpan = document.querySelectorAll(".file-input span");


    for (let i = 0; i < fileInput.length; i++) {
        (function (index) {
            fileButton[i].addEventListener("click", function () {
                fileInput[index].click();
            });
            fileInput[i].addEventListener("change", function () {
                fileSpan[index].innerHTML = fileInput[index].value;
            })
        })(i);
    }
}

// counter
const counterSpan = document.querySelectorAll('.counter-span');
const windowHeight = window.innerHeight;
let statusArray = Array(counterSpan.length).fill(false);


window.addEventListener('scroll', function () {
    counterSpan.forEach((span, index) => {
        const position = span.offsetTop - 600;
        if (window.scrollY > position) {
            statusArray[index] = true;
        }
    })
})
counterSpan.forEach((span, index) => {
    let start = 0;
    let end = parseInt(span.getAttribute('data-val'));
    let time = 50;
    let interval = setInterval(function () {
        if (statusArray[index] === true) {
            if (end < 100) {
                start += 1;
            } else if (end > 100 && end < 1000) {
                start += 10;
                end -= end % 10;
            } else if (end > 1000 && end < 10000) {
                start += 15;
                end -= end % 15;
            } else {
                start += 50;
                end -= end % 50;
            }
            span.innerHTML = start;
            if (start === end) {
                clearInterval(interval);
                span.innerHTML = span.getAttribute('data-val');
            }
        }
    }, time)
})


if (document.querySelector('.alert-message')) {
    let alertMsg = document.querySelector('.alert-message');
    let closeAlertBtn = document.querySelector('.alert-message button');

    setTimeout(() => {
        alertMsg.classList.add('hide-alert');
    }, 3000);
    setTimeout(() => {
        alertMsg.remove();
    }, 4000);

    closeAlertBtn.addEventListener('click', () => {
        alertMsg.classList.add('hide-alert');
        setTimeout(() => {
            alertMsg.remove();
        }, 3000);
    })
}


let galleryButtons = document.querySelectorAll('.gallery-buttons button');
let galleryImages = document.querySelectorAll('.gallery-img-col');

galleryButtons[0].classList.add('active');
galleryButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
        let categoryID = btn.getAttribute('data-id');
        for (let i = 0; i < galleryButtons.length; i++) {
            galleryButtons[i].classList.remove('active');
        }
        btn.classList.add('active')
        if (categoryID === 'all') {
            for (let i = 0; i < galleryImages.length; i++) {
                galleryImages[i].classList.remove('d-none');
            }
        }else{
            let filteredImages = Array.from(galleryImages).filter((img) => img.getAttribute('data-category-id') === categoryID);
            for (let i = 0; i < galleryImages.length; i++) {
                galleryImages[i].classList.add('d-none');
            }
            for (let i = 0; i < filteredImages.length; i++) {
                filteredImages[i].classList.remove('d-none');
            }
        }
    })
})



let scrollLinkWrapper = document.querySelectorAll('.scroll-links');
let sections = document.querySelectorAll('section');
let mainSections = Array.from(sections).filter((s) => s.getAttribute('data-scroll') === 'true');


scrollLinkWrapper.forEach((wrapper) => {
    let links = wrapper.querySelectorAll('a');
    links.forEach((link,index) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            for(let i = 0; i < links.length; i++){
                links[i].classList.remove('active');
            }
            link.classList.add('active')
            let position = mainSections[index].offsetTop - 110;
            window.scrollTo(0,position);
        })
    })
})