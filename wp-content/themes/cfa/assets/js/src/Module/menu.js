const { gsap } = require("gsap/dist/gsap");


var menuTl = gsap.timeline({ paused: true });

menuTl.set(".logo", { color: "#000" })

menuTl.to('.menu-wrap', {
  scaleY: 1,
  ease: "power2.in",
  duration: 0.4,
  transformOrigin: "top"
});



menuTl.from(".menu-wrap li", {
  opacity: 0,
  duration: .4,
  yPercent: 110,
  stagger: 0.1,
});

menuTl.reverse();

function menu() {
  const ham = document.querySelector(".menu-btn");
  const menu = document.querySelector(".menu-wrap");
  const menulinks = menu.querySelectorAll(".menu-wrap .link");

  


  ham.addEventListener("click", () => {
   menuTl.reversed(!menuTl.reversed());
    ham.classList.toggle("active")
  });

  

  /* We  close the menu-wrap - link click */

  menulinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      menuTl.reverse();
      ham.classList.remove("active")

    });
  });

}

export { menu, menuTl };


