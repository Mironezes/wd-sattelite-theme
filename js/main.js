function Init() {
  const header = document.querySelector('.site-header');
  const main_nav = document.querySelector('#header-navigation');
  const back_to_top_btn = document.querySelector('#site-back-to-top');
  const mobile_nav = document.querySelector('#mobile-navigation');
  const toc_list = Array.from(document.querySelectorAll('.toc_list a'));

  function fixedMobileMenu() {
    if(window.matchMedia("(max-width: 1240px)").matches) {
      if(window.pageYOffset > header.offsetTop) {
        mobile_nav.classList.add('fixed');
        header.classList.add('fixed');
      }
      else {
        mobile_nav.classList.remove('fixed');
        header.classList.remove('fixed');
      }
    }
    else {
      mobile_nav.classList.remove('active');
    }
  }
  window.addEventListener('scroll', fixedMobileMenu);
  window.addEventListener('resize', fixedMobileMenu);


  function smoothTOC(e) {
    e.preventDefault()
    let hash = this.getAttribute("href");
    let target = document.querySelector(hash);
    if(target) {
      let headerOffset = 100;
      let elementPosition = target.offsetTop;
      let offsetPosition = elementPosition - headerOffset;
  
      window.scrollTo({
          top: offsetPosition,
          behavior: "smooth"
      });
    }
    else {
      console.log(`Here's a problem with TOC hash target ${hash}`);
    }
  }
  if(toc_list) {
    toc_list.forEach(toc_item => {
        toc_item.addEventListener('click', smoothTOC);
    });
  }

  
  function backToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
  }
  back_to_top_btn.addEventListener('click', backToTop);

}
document.addEventListener('DOMContentLoaded', Init, {once: true});