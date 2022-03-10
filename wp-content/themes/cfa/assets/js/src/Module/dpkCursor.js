import { isMobile } from "./Helper";
const { gsap } = require("gsap/dist/gsap");



/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                 Create Html Cursor  Element
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

const dpkCursor = document.createElement("div");
dpkCursor.classList.add("dpkCursor");


/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                  Cursor Init Function
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/


function initCursor(speedOption = 0.13, easeOption = "sine.out") {
  if (!isMobile()) {
    document.body.appendChild(dpkCursor);
    gsap.set(dpkCursor, { xPercent: -50, yPercent: -50 });

    let dpkCursorPos = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
    let dpkCursorMouse = { x: dpkCursorPos.x, y: dpkCursorPos.y };
    let dpkCursorXSet = gsap.quickSetter(dpkCursor, "x", "px");
    let dpkCursorYSet = gsap.quickSetter(dpkCursor, "y", "px");

    window.addEventListener("mousemove", (e) => {
      gsap.to(dpkCursorMouse, {
        duration: speedOption,
        x: e.x,
        y: e.y,
        ease: easeOption,
        overwrite: true,
      });
    });

    gsap.ticker.add(() => {
      dpkCursorPos.x += dpkCursorMouse.x - dpkCursorPos.x;
      dpkCursorPos.y += dpkCursorMouse.y - dpkCursorPos.y;
      dpkCursorXSet(dpkCursorPos.x);
      dpkCursorYSet(dpkCursorPos.y);
    });
  }
}







/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                  Cursor Reset Function
 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

function resetCursor() {
  dpkCursor.innerHTML = "";
  dpkCursor.style.background = ""
  dpkCursor.className = "dpkCursor";
}






/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                  Cursor Effects
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

function cursorEffects() {
  const dataHover = document.querySelectorAll(".dpk-hover");

  if (!isMobile() && dataHover) {
    dataHover.forEach(function (target) {

      let dataHoverText = target.getAttribute("data-hover-text");
      let dataHoverBg = target.getAttribute("data-hover-bg");
      let dataHoverClass = target.getAttribute("data-hover-class");
      let dataHoverImg = target.getAttribute("data-hover-img");


      target.addEventListener("mouseenter", function () {

        if (dataHoverText) dpkCursor.innerHTML = dataHoverText;

        if (dataHoverClass) dpkCursor.classList.add(dataHoverClass);
        else dpkCursor.classList.add("hover-active");

        if (dataHoverBg) {
          dpkCursor.style.backgroundColor = dataHoverBg;
          dpkCursor.classList.add("hover-bg");
        }

        if (dataHoverImg) dpkCursor.style.backgroundImage = `url(${dataHoverImg})`;
      });


      target.addEventListener("mouseleave", function () {
        dpkCursor.innerHTML = "";
        dpkCursor.style.background = "";

        if (dataHoverClass) dpkCursor.classList.remove(dataHoverClass);
        else dpkCursor.classList.remove("hover-active");

        if (dataHoverBg) dpkCursor.classList.remove("hover-bg");
      });


      // Fix This due to clauser It not working properly
      target.addEventListener("click", resetCursor);
    });
  }
}






/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                  export dpkCursor & Functions
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

export { dpkCursor, initCursor, resetCursor, cursorEffects };
