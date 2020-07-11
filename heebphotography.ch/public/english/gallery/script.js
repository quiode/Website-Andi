//  resizes the image depending on its height/width and the width/height of the window
window.onresize = resizeToMax;
// looks for key inputs
document.addEventListener("keydown", key_pressed);

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

// lets the slideshow appear/disapper
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

// shows next picture
function next_picture() {
    img_src = document.getElementById("slideshow_image").src;
    var images = [];
    // makes a list of all images
    for (let i = 0; i < document.getElementsByClassName("image").length; i++) {
        images.push(document.getElementsByClassName("image")[i].src);
    }
    var final_src;
    if ((images.indexOf(img_src) + 1) < (images.length)) {
        final_src = images[images.indexOf(img_src) + 1]
    } else {
        final_src = images[0];
    }
    document.getElementById("slideshow_image").src = final_src;
}

// shows last picture
function last_picture() {
    img_src = document.getElementById("slideshow_image").src;
    var images = [];
    // makes a list of all images
    for (let i = 0; i < document.getElementsByClassName("image").length; i++) {
        images.push(document.getElementsByClassName("image")[i].src);
    }
    var final_src;
    if ((images.indexOf(img_src) - 1) >= 0) {
        final_src = images[images.indexOf(img_src) - 1];
    } else {
        final_src = images[images.length - 1];
    }
    document.getElementById("slideshow_image").src = final_src;
}

// looks which key is pressed and executes the right funciton
function key_pressed(event) {
    var key = event.which || event.keyCode; // Use either which or keyCode, depending on browser support
    if (document.getElementById("slideshow").style.display == "block") {
        if (key == 39) {
            next_picture();
        } else if (key == 37) {
            last_picture();
        }
        else if (key == 27) {
            slideshow_off();
        }
    }
}