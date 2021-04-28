if (document.querySelector('#admin-navbar')) {
    let navbar = document.querySelector('#admin-navbar');
    let btn_collapse = document.querySelector('#admin-nav-collapse');
    let icon_collapse = document.querySelector('#admin-nav-icon');
    let nav_menu = document.querySelector('#admin-nav-menu');
    btn_collapse.addEventListener('click', function() {
        nav_menu.classList.toggle('d-none');
        icon_collapse.classList.toggle('fa-bars');
        icon_collapse.classList.toggle('fa-times');
    });
}