// var doScroll = function (event) {
//     // cross-browser wheel delta
//     var e = window.event || event;
//     var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));

//         /* Prehome scroll slide to next section */   
           
//         e.stopImmediatePropagation();
//         e.stopPropagation()
//         $(this).addClass('wheeled'); 
//         if(delta > 0 ) {
//             // Scrolling up
//             var offset = $("#home-content").offset();
//             var posY = offset.top - $(window).scrollTop();
//             console.log('posy : ' + posY);
//             if(posY > -600 && posY < -100) {
//                 e.stopPropagation();
//                 $([document.documentElement, document.body]).animate({
//                     scrollTop: $("#home-content").offset().top                    
//                 }, 300, 'easeOutExpo');
//             }else if(posY > -100) {
//                 e.stopPropagation();
//                 $("body, html").animate({ scrollTop: 0 }, 800, 'easeOutExpo');
//             }
//         }else if((delta < 0) && $(window).scrollTop() < 100){
//             // Scrolling down
//             $('.scrolling-down').click();
//         }     
// };

// if($(".pre-home").length > 0) {
//     if (window.addEventListener) {
//         window.addEventListener("mousewheel", doScroll, false);
//         window.addEventListener("DOMMouseScroll", doScroll, false);
//     } else {
//         window.attachEvent("onmousewheel", doScroll);
//     }
// }

//const cImage = document.getElementById('clipped-image');
// const $cImg = $('#clipped-image');
// const $body = $('body');

// $body.mousemove(function(e){  
//     console.log($cImg);
//   $cImg.css('--clip-position', `${e.pageX}px ${e.pageY}px`);  
// });
if ( document.getElementsByClassName('pre-home').length > 0 ){
    console.clear();
    const svg = document.querySelector("#demo");
// const tl = new TimelineMax({onUpdate:onUpdate});
    const tl = new TimelineMax();
    let pt = svg.createSVGPoint();
    let data = document.querySelector(".tlProgress");
    let counter = document.querySelector("#counter");


    gsap.set("#instructions, #dial", {xPercent: -50});
// gsap.set("#progressRing", {drawSVG:0});

    tl.to("#masker", {duration: 2, attr:{r:2400}, ease:"power2.in"});
    tl.reversed(true);

    window.addEventListener("mousedown", mouseHandler);
    window.addEventListener("mouseup", mouseHandler);
    window.addEventListener("mousemove", mouseMove);

    newSize();
    window.addEventListener("resize", newSize);


    function mouseHandler() {
        tl.reversed(!tl.reversed());
    }

    function getPoint(evt){
        pt.x = evt.clientX;
        pt.y = evt.clientY;
        return pt.matrixTransform(svg.getScreenCTM().inverse());
    }

    function mouseMove(evt) {
        let newPoint = getPoint(evt);
        gsap.set("#dot", {attr:{cx:newPoint.x, cy:newPoint.y}});
        gsap.to("#ring, #masker", 0.88, {attr:{cx:newPoint.x, cy:newPoint.y}, ease:"power2.out"});
    }

// function onUpdate() {
//   let prog = (tl.progress() * 100);
//   gsap.set("#progressRing", {drawSVG:prog + "%"});
//   counter.textContent = prog.toFixed();
// }

    function newSize() {
        let w = window.innerWidth ;
        let h = window.innerHeight;
        const ratio = 0.5625;
        if (w > h * (16/9) ) {
            gsap.set("#demo", { attr: { width: w, height: w * ratio } });
        } else {
            gsap.set("#demo", { attr: { width: h / ratio, height: h } });
        }
        let data = svg.getBoundingClientRect();
        gsap.set("#demo", {x:w/2 - data.width/2});
        gsap.set("#demo", {y:h/2 - data.height/2});
    }

}



