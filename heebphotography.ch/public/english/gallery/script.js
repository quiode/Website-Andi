//  resizes the image depending on its height/width and the width/height of the window
window.onresize = resizeToMax;
function resizeToMax() {
    myImage = new Image();
    var img = document.getElementById("slideshow_image");
    if (img.src.width / document.body.clientWidth > img.src.height / document.body.clientHeight) {
        img.style.width = "100%";
    } else {
        img.style.height = "100%";
    }
    var arrows_background = document.getElementsByClassName("arrows_background");
    for (let index = 0; index < arrows_background.length; index++) {
        const arrow = arrows_background[index];
        arrow.style.width = (Number((window.innerWidth - img.getBoundingClientRect().width) / 2)) + "px";
    }
    
    // var arrows = document.getElementsByClassName("arrows");
    // for (let index = 0; index < arrows.length; index++) {
    //     const arrow = arrows[index];
    //     arrow.style.width = (Number((window.innerWidth - img.getBoundingClientRect().width) / 2)) - (Number((window.innerWidth - img.getBoundingClientRect().width) / 2))/2 + "px";
    //     arrow.style.height = (Number((window.innerWidth - img.getBoundingClientRect().width) / 2)) - (Number((window.innerWidth - img.getBoundingClientRect().width) / 2))/2 + "px";
    // }

    // alert("resizetoMax executed");
}

function slideshow_on(src) {
    document.getElementById("navigation_button").style.display = "none";
    document.getElementById("slideshow_background").style.display = "block";
    document.getElementById("slideshow").style.display = "block";
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
    document.getElementById("slideshow_image").src = src;
}

function slideshow_off() {
    document.getElementById("navigation_button").style.display = "inline-block";
    document.getElementById("slideshow_background").style.display = "none";
    document.getElementById("slideshow").style.display = "none";
    document.getElementsByTagName("body")[0].style.overflow = "auto";
}