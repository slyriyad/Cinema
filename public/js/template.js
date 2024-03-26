const boutton = document.getElementById("hamburger-logo")
const menuBurger = document.querySelector(".menu-burger") 

boutton.addEventListener('click', function() {
    boutton.classList.toggle('clicked');

    if (boutton.classList.contains('clicked')) {
        menuBurger.style.top = '0'
    } else {
        menuBurger.style.top = '-100%'
    }
})