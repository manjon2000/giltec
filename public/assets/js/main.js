let iconOpenMenu = document.querySelector('.navbar-mobile_icon_open_menu');
let menu = document.querySelector('.navbar-mobile_menu');
let iconCloseMenu = document.querySelector('.btn-close')
let openMenuHome = document.querySelector('.open-menu');
let navContainer = document.querySelector('.navbar-container');

let menuHome = document.querySelector('.menu-home');

// Open and close menu mobile
iconCloseMenu.addEventListener('click', function() {
    menu.classList.remove('actived');
});

iconOpenMenu.addEventListener('click', function() {
    menu.classList.add('actived')
});
// End open and close menu mobile


    if(window.innerWidth > 1024)
    {
        openMenuHome.addEventListener('click', function() {
            menuHome.classList.add('actived');
        });
    }

