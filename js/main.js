function Init() {
  const main_nav = document.querySelector('#header-navigation');
  const mobile_menu_toggler = main_nav.querySelector('#mobile-menu-toggler');

  function mobileNavigation() {
    mobile_menu_toggler.nextElementSibling.querySelector('ul').classList.toggle('open');
    main_nav.classList.toggle('active');
  }
  mobile_menu_toggler.addEventListener('click', mobileNavigation);
  

}
document.addEventListener('DOMContentLoaded', Init, {once: true});