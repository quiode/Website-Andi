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
}

// lets the slideshow appear/disapper
function slideshow_on(src) {
    document.getElementById("navigation_button").style.display = "none";
    document.getElementById("slideshow_background").style.display = "block";
    document.getElementById("slideshow").style.display = "block";
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
    // gets the original image instead of the thumbnail
    var newPath = src.replace("/thumbnail", "");
    document.getElementById("slideshow_image").src = newPath;
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
        images.push(document.getElementsByClassName("image")[i].src.replace("/thumbnail", ""));
    }
    var final_src;
    if ((images.indexOf(img_src) + 1) < (images.length)) {
        final_src = images[images.indexOf(img_src) + 1];
    } else {
        final_src = images[0];
    }
    // gets the original image instead of the thumbnail
    var newPath = final_src.replace("/thumbnail", "");
    document.getElementById("slideshow_image").src = newPath;
}

// shows last picture
function last_picture() {
    img_src = document.getElementById("slideshow_image").src;
    var images = [];
    // makes a list of all images
    for (let i = 0; i < document.getElementsByClassName("image").length; i++) {
        images.push(document.getElementsByClassName("image")[i].src.replace("/thumbnail", ""));
    }
    var final_src;
    if ((images.indexOf(img_src) - 1) >= 0) {
        final_src = images[images.indexOf(img_src) - 1];
    } else {
        final_src = images[images.length - 1];
    }
    // gets the original image instead of the thumbnail
    var newPath = final_src.replace("/thumbnail", "");
    document.getElementById("slideshow_image").src = newPath;
}

// looks which key is pressed and executes the right funciton
function key_pressed(event) {
    var key = event.which || event.keyCode; // Use either which or keyCode, depending on browser support
    if (document.getElementById("slideshow").style.display == "block") {
        if (key == 39) {
            next_picture();
        } else if (key == 37) {
            last_picture();
        } else if (key == 27) {
            slideshow_off();
        }
    }
}

// changes the images when swiping (not my code, source: http://www.javascriptkit.com/javatutors/touchevents2.shtml)
function swipedetect(callback) {
    var el = document.getElementById("gallery");
    var touchsurface = el,
        swipedir,
        startX,
        startY,
        distX,
        distY,
        threshold = 150, //required min distance traveled to be considered swipe
        restraint = 100, // maximum distance allowed at the same time in perpendicular direction
        allowedTime = 300, // maximum time allowed to travel that distance
        elapsedTime,
        startTime,
        handleswipe = callback || function (swipedir) {};

    touchsurface.addEventListener('touchstart', function (e) {
        var touchobj = e.changedTouches[0];
        swipedir = 'none';
        dist = 0;
        startX = touchobj.pageX;
        startY = touchobj.pageY;
        startTime = new Date().getTime(); // record time when finger first makes contact with surface
        e.preventDefault();
    }, false);

    touchsurface.addEventListener('touchmove', function (e) {
        e.preventDefault(); // prevent scrolling when inside DIV
    }, false);

    touchsurface.addEventListener('touchend', function (e) {
        var touchobj = e.changedTouches[0];
        distX = touchobj.pageX - startX; // get horizontal dist traveled by finger while in contact with surface
        distY = touchobj.pageY - startY; // get vertical dist traveled by finger while in contact with surface
        elapsedTime = new Date().getTime() - startTime; // get time elapsed
        if (elapsedTime <= allowedTime) { // first condition for awipe met
            if (Math.abs(distX) >= threshold && Math.abs(distY) <= restraint) { // 2nd condition for horizontal swipe met
                swipedir = (distX < 0) ? 'left' : 'right'; // if dist traveled is negative, it indicates left swipe
            } else if (Math.abs(distY) >= threshold && Math.abs(distX) <= restraint) { // 2nd condition for vertical swipe met
                swipedir = (distY < 0) ? 'up' : 'down'; // if dist traveled is negative, it indicates up swipe
            }
        }
        handleswipe(swipedir);
        e.preventDefault();
    }, false);
}

window.addEventListener("load", function () {
    swipedetect(function (swipedir) {
        // swipedir contains either "none", "left", "right", "top", or "down"
        switch (swipedir) {
            case "none":
                break;
            case "left":
                last_picture();
                break;
            case "right":
                next_picture();
                break;
            case "top":
                last_picture();
                break;
            case "down":
                next_picture();
                break;
            default:
                break;
        }
    });
});