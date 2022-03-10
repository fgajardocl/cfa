import Swiper from "swiper/bundle";
import { select } from "./Helper";





/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
          Get Direction Method for Swiper
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

const getDirection = () => {
  let windowWidth = window.innerWidth;
  let direction = window.innerWidth <= 760 ? "horizontal" : "vertical";
  return direction;
}





/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                   Slider  2  
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

var swiperFuro;

function createSwiperFuro(swiperElement) {
  swiperFuro = new Swiper(swiperElement, {
    // direction: "vertical",
    loop: true,
    grabCursor: false,
    parallax: true,
    effect: "slide",
    speed: 500,

    autoplay: {
      delay: 3000,
    },

    keyboard: {
      enabled: true,
      onlyInViewport: false,
    },
    breakpoints: {
      1024: {
        speed: 1000
      }
    },



    lazy: {
      loadPrevNext: true,
      loadPrevNextAmount: 2,
    },
    navigation:{
      nextEl:".right",
      prevEl:".left"

    },

    // pagination: {
      
    //   el: ".swiper-paginationF",
    //   type: "bullets",
    //   clickable: true,
    // },
    scrollbar: {
      el: ".swiper-scrollbar",
    },
  });
}

function destroySwiperFuro() {
  swiperFuro.destroy(true, true);
}







/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
       Create & Destroy Swiper On Barba View
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/




export const swiperView = {

  namespace: "Home",


  

  afterEnter() {
    const svf = select(".project-slider .swiper-container");
    svf && createSwiperFuro(svf);

  },


  

  afterLeave() {

    const svfd = select(".project-slider .swiper-container");
    svfd && destroySwiperFuro();
  },


};
