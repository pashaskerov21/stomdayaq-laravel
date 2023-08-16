const bannerSwiper = new Swiper(".banner-swiper", {
    autoplay: {
    delay: 5000,
    disableOnInteraction: false,
    },
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});



/*partner swiper*/
const partnerSwiper = new Swiper(".partner-swiper", {
    autoplay: {
    delay: 5000,
    },
    slidesPerView: 1,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    spaceBetween: 10,
      breakpoints: {
        380: {slidesPerView: 2},
        768: {slidesPerView: 3},
        1200: {slidesPerView: 4},
        1400: {slidesPerView: 5},
      },
  });

/*partner swiper*/
const workerSwiper = new Swiper(".worker-swiper", {
    autoplay: {
    delay: 5000,
    },
    slidesPerView: 1,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    spaceBetween: 10,
      breakpoints: {
        576: {slidesPerView: 2},
        768: {slidesPerView: 3},
        992: {slidesPerView: 4},
        1200: {slidesPerView: 5},
        1400: {slidesPerView: 6},
      },
  });