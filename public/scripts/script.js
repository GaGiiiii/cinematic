// BANNER OWL CAROUSEL
$("#banner-area .owl-carousel").owlCarousel({
    dots: true,
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
    smartSpeed: 2000
});

let logo = document.querySelector('a.navbar-brand');
// console.log(logo);

setInterval(() => {
    if(logo.style.color == ""){
        logo.style.color = "#000";
    }else if(logo.style.color == "rgb(255, 255, 255)"){
        logo.style.color = "#000";
    }else if(logo.style.color == "rgb(0, 0, 0)"){
        logo.style.color = "#fff";
    }
}, 1000);

let cardsAdmin = document.querySelectorAll('.card-admin');
let invisible = document.querySelectorAll('.invis');

cardsAdmin.forEach(card => {
    card.addEventListener('mouseover', (event) => {
        let index = event.currentTarget.getAttribute("data-index");
        invisible[index].classList.remove("invis");
    });

    card.addEventListener('mouseout', (event) => {
        let index = event.currentTarget.getAttribute("data-index");
        invisible[index].classList.add("invis");
    });

    card.addEventListener('click', (event) => {
        console.log("click");
    });
});

