const { gsap } = require("gsap/dist/gsap");
const imagesLoaded = require("imagesloaded");







/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                     Single Layer effect
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/


function pageLeave1(done) {
  let tl = gsap.timeline();
  tl.to(".singleLayer", {
    duration: 1.2,
    ease: "power2.inOut",
    scaleY: 1,
    transformOrigin: "top",
  });
  tl.from(".singleLayer h1", {
    y: -100,
    opacity: 0,
    duration: .8,
    onComplete: () => done()
  }, "-=.4");
}

function pageEnter1() {
  let tl = gsap.timeline({ onUpdate: gsapDebugSlider });

  tl.to(".singleLayer h1", {
    y: 200,
    opacity: 0,
    ease: "power1.inOut",
    duration: .8,
    delay:.2,
  });

  tl.to(".singleLayer", {
    duration: 1,
    ease: "power1.inOut",
    scaleY: 0,
    transformOrigin: "bottom",
  }, "-=.3");

  tl.set(".singleLayer h1" ,{y:0, opacity:1})
  gsapDebug(tl);
}






/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                     DA.cl Effect
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/


function pageLeave(done) {
  let tl = gsap.timeline();
  tl.to("ul.transition li", {
    duration: 0.25,
    scaleY: 1,
    transformOrigin: "bottom left",
    stagger: 0.1,
  });
  tl.from(".t-logo", { scale: 1.2, opacity: 0, onComplete: () => done() });
}

function pageEnter() {
  let tl = gsap.timeline();
  tl.to(".t-logo", { scale: 0.8, opacity: 0, delay: 0.7 });

  tl.to("ul.transition li", {
    duration: 0.35,
    scaleY: 0,
    transformOrigin: "bottom left",
    stagger: 0.1,
  });
  tl.set(".t-logo", { scale: 1, opacity: 1 });
}



/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                      Barba Js
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/





function disappears(element, durations, done) {
  gsap.to(element, {
    autoAlpha: 0,
    duration: durations,
    ease: "expo.out",
    onComplete: () => done(),
  });
}

function appears(element, durations) {
  gsap.from(element, { opacity: 0, duration: durations, ease: "power2.in" });
}






function showLoading(container) {
  const dynamicLoad = document.getElementById("dynamicLoad");
  const dynamicProgress = dynamicLoad.querySelector(".progress");
  const dynamicBar = dynamicLoad.querySelector(".bar");
  let loadedCount = 0;
  let loadingProgress = 0;

  // gsap.set(container, { alpha: 0 });

  gsap.to(dynamicProgress, {
    duration: 0.5,
    width: "100%",
    ease: "expo.inOut",
  });

  let imgLoad = imagesLoaded(container, { background: true });

  if (imgLoad.images.length == 0) {
    dynamicBar.style.width = "100%";
    doneLoading();
  }

  imgLoad.on("progress", function (instance, image) {
    var imagesToLoad = instance.images.length;
    loadProgress(imagesToLoad);

  });

  function loadProgress(imagesToLoad) {
    loadedCount++;
    loadingProgress = (loadedCount / imagesToLoad) * 100;
    dynamicBar.style.width = loadingProgress + "%";

    if (loadingProgress == 100) {
      doneLoading();
    }
  }

  function doneLoading() {
    setTimeout(function () {
      hideLoading();
    }, 500);
  }

  function hideLoading() {
    setTimeout(function () {
      gsap.set(dynamicProgress, { css: { right: "0", left: "auto" } });
      gsap.to(dynamicProgress, {
        duration: 0.5,
        alpha: 1,
        width: "0",
        ease: "expo.inOut",
        onComplete: resetLeft(),
      });
    }, 100);


    // gsap.to(container, { duration: 0.5, alpha: 1 });

    function resetLeft() {
      setTimeout(function () {
        gsap.set(dynamicProgress, { css: { left: "0", right: "auto" } });
        gsap.set(dynamicBar, { css: { width: "0" } });
      }, 450);
    }

  }
}



export { pageEnter, pageLeave, disappears, appears, showLoading };
