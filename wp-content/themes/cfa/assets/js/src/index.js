import barba from "@barba/core";
import barbaPrefetch from "@barba/prefetch";
import LazyLoad from "vanilla-lazyload";
import { signature } from "./Module/Helper";
import { playlogo } from "./Module/lottieFile";

// signature();

import {
  dpkCursor,
  initCursor,
  resetCursor,
  cursorEffects,
} from "./Module/dpkCursor";

import { scroll, smooth } from "./Module/loco";


import { menu ,menuTl } from './Module/menu'
menu();



/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                    invokded Once 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

initCursor();


/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
              Prevent Reload On Same Page 
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

let pagelinks = document.querySelectorAll(".link a[href], .link, .nav .menu .menu-item");
const preventReload = function (e) {
  if (e.currentTarget.href === window.location.href) {
    e.preventDefault();
    e.stopPropagation();
    scroll.scrollTo(0);
    menuTl.reverse();
    document.querySelector(".menu-btn").classList.remove("active")
  }
};

for (let i = 0; i < pagelinks.length; i++) {
  pagelinks[i].addEventListener("click", preventReload);
}

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                        LazyLoad
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

function lazy_load() {
  const lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy",
    thresholds: "100% 800px",
  });
}

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Barba init on [Once & Before enter]
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/








import { swiperView } from "./Module/Slider";











function init() {
  window.scrollTo(0, 0);
  resetCursor();
  lazy_load();
  setTimeout(() => {
    cursorEffects();
  }, 1100);
}

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                 Barba Js
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

barba.use(barbaPrefetch);
import { appears, disappears } from "./Module/barbaHelper";

barba.init({
  schema: { prefix: "data-dpk" }, 
  debug: true,
  timeout: 5000,
  preventRunning: true,

  transitions: [
    {
      name: "dpk-transition",
      once({ next }) {
        smooth(next.container);
        init();
        playlogo();

      },

      async leave(data) {
        const done = this.async();
        disappears(data.current.container, 0.6, done);
        scroll.destroy();
      },

      beforeEnter({ next }) {
        smooth(next.container);
        init();
        scroll.stop();
      },

      enter({ next }) {
        appears(next.container, 0.8);
        setTimeout(() => {
          scroll.start();

        }, 1000);
      },
    },
  ],

  views: [swiperView],

});
