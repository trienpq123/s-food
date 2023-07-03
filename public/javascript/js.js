const close_m = document.querySelector('#close-m-menu'),
    openM = document.querySelector('.show_M');

close_m.addEventListener("click", function() {
    let m_menu = document.querySelector('.navbar-m');
    let overlay = document.querySelector('.overlay')
    m_menu.style.left = "-100%";
    m_menu.style.transition = "all .5s";
    overlay.style.opacity = "-1";
    overlay.style.zIndex = "-1";
    overlay.style.transition = "all .5s";
});

openM.addEventListener("click", function() {
    let m_menu = document.querySelector('.navbar-m');
    let overlay = document.querySelector('.overlay');
    overlay.style.opacity = "2";
    overlay.style.zIndex = "3";
    m_menu.style.left = "0";
})