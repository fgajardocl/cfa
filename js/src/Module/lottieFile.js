import lottie from "lottie-web";
const { gsap } = require("gsap/dist/gsap");


var logoDa = lottie.loadAnimation({
    container: document.getElementById("logoCFA"),
    renderer: "svg",
    loop: false,
    autoplay: false,
    path: "./js/data.json",
});



const playlogo = () => {
    logoDa.goToAndPlay(0, true);

    const tl = gsap.timeline({
        delay:3
    });

    tl.to("#logoCFA", {
        opacity: 0
    })
    tl.to(".logoCFA", {
        height: 0,
        transformOrigin: "bottom",
        duration:.8,
    })

}


export { playlogo }