let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

// const spans = document.querySelectorAll('.progres-bar span');

// spans.forEach((span) => {
//     span.style.widht = span.dataset.widht;
//     span.innerHTML = span.dataset.widht;
// });

