//  resizes the image depending on its height/width and the width/height of the window
window.onresize = resizeToMax;
// looks for key inputs
document.addEventListener("keydown", key_pressed);

function resizeToMax() {
    // myImage = new Image();
    var img = document.getElementById("slideshow_image");
    // if (img.src.width / document.body.clientWidth > img.src.height / document.body.clientHeight) {
    //     img.style.width = "100%";
    // } else {
    //     img.style.height = "100%";
    // }

    // let the arrows fill the blank space
    var arrows_background = document.getElementsByClassName("arrows_background");
    for (let index = 0; index < arrows_background.length; index++) {
        var arrow = arrows_background[index];
        arrow.style.width = (Number((window.innerWidth - img.getBoundingClientRect().width) / 2)) + "px";
    }
    image_description();
}

function image_description() {
    for (let index = 0; index < document.getElementsByClassName("image").length; index++) {
        const element = document.getElementsByClassName("image")[index];
        if (element.src.replace("/thumbnail", "") == document.getElementById("slideshow_image").src) {
            thumbnail_image = element;
        }
    }
    category = thumbnail_image.classList.item(1);
    type = thumbnail_image.classList.item(2);
    category = category.replace(/_/g, " ");
    type = type.replace(/_/g, " ");
    document.getElementById("picture_description").innerHTML = category + ": " + type;
    // if (window.innerWidth <= 600) {
    //     document.getElementById("picture_description").style.height = "0px";
    // } else {
    //     document.getElementById("picture_description").style.height = (document.getElementById("slideshow_image").offsetHeight / 15 + 2).toString() + "px";
    // }
    document.getElementById("picture_description").style.width = (document.getElementById("slideshow_image").offsetWidth + 2).toString() + "px";
    document.getElementById("picture_description").style.left = document.getElementById("slideshow_image").offsetLeft.toString() + "px";
    document.getElementById("picture_description").style.bottom = ((window.innerHeight - document.getElementById("slideshow_image").offsetHeight) / 2).toString() + "px";
    // alert((document.getElementById("slideshow_image").offsetHeight/10).toString());
    // alert(document.getElementById("picture_description").style.height);
    // alert(document.getElementById("slideshow_image").offsetTop.toString());
    // alert(document.getElementById("picture_description").style.bottom);
}

// lets the slideshow appear/disapper
function slideshow_on(src) {
    openFullscreen();
    document.getElementById("navigation_button").style.display = "none";
    document.getElementById("slideshow_background").style.display = "block";
    document.getElementById("slideshow").style.display = "block";
    document.getElementsByTagName("body")[0].style.overflow = "hidden";
    // gets the original image instead of the thumbnail
    var newPath = src.replace("/thumbnail", "");
    document.getElementById("slideshow_image").src = newPath;
}

function slideshow_off() {
    closeFullscreen();
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
    var el = document.getElementById("slideshow_image");
    var touchsurface = el,
        swipedir,
        startX,
        startY,
        distX,
        distY,
        threshold = 50, //required min distance traveled to be considered swipe
        restraint = 75, // maximum distance allowed at the same time in perpendicular direction
        allowedTime = 600, // maximum time allowed to travel that distance
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
                next_picture();
                break;
            case "right":
                last_picture();
                break;
            case "top":
                break;
            case "down":
                break;
            default:
                break;
        }
    });
});

// functions for fullscreen (source:https://www.w3schools.com/jsref/met_element_exitfullscreen.asp)
/* Get the documentElement (<html>) to display the page in fullscreen */
var elem = document.documentElement;

/* View in fullscreen */
function openFullscreen() {
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.mozRequestFullScreen) {
        /* Firefox */
        elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
        /* Chrome, Safari and Opera */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) {
        /* IE/Edge */
        elem.msRequestFullscreen();
    }
}

/* Close fullscreen */
function closeFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
        /* Firefox */
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
        /* Chrome, Safari and Opera */
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
        /* IE/Edge */
        document.msExitFullscreen();
    }
}

// opens/closes filter menu
function filter() {
    if (document.getElementById("filter_menu").style.display == "none") { // if the filtermenu isn't open, opens it
        document.getElementById("filter_menu").style.display = "initial";
        document.getElementsByClassName("filter_btn")[0].style.transform = "rotate(180deg)";
        document.getElementById("navigation_button").style.display = "none";
        document.getElementById("gallery").style.overflow = "hidden ";
    } else { // if the filtermenu is open, closes it
        document.getElementById("navigation_button").style.display = "inline-block";
        document.getElementById("filter_menu").style.display = "none";
        document.getElementsByClassName("filter_btn")[0].style.transform = "";
        document.getElementById("gallery").style.overflow = "initial";
    }
}

// makes a cookie that the everything button was last pressed and sends the form
function all_button(element) {
    var d = new Date();
    d.setTime(d.getTime() + 5000 * 60 * 60);
    document.cookie = "all_first_clicked=true;expires=" + d.toUTCString() + ";path=/;samesite=lax";
    element.form.submit();
}

// makes a cookie that something was searched and sends the form
function searchbar_clicked(element) {
    var d = new Date();
    d.setTime(d.getTime() + 5000 * 60 * 60);
    document.cookie = "searchbar_first_clicked=true;expires=" + d.toUTCString() + ";path=/;samesite=lax";
    element.form.submit();
}

function filter(filter_element) {
    var filter_value = "";
    // depending on the input, set the filter value
    if (filter_element.value === undefined && filter_element.innerHTML != "") {
        // alert("Button");
        let all_buttons = document.getElementsByClassName("filter_option");
        for (let index = 0; index < all_buttons.length; index++) {
            const button = all_buttons[index];
            button.classList.remove("selected");
        }
        filter_element.classList.add("selected");
        filter_value = filter_element.innerHTML;
    } else if (filter_element.value != "") {
        // alert("Searchbar");
        filter_value = filter_element.value;
    }
    // filter the images for the filter value
    filter_value = filter_value.toLowerCase(); // for easier searching
    if (filter_value == "everything") {
        var images = document.getElementsByClassName("image");
        for (let index = 0; index < images.length; index++) {
            const image = images[index];
            image.style.display = "initial";
        }
    } else if (filter_value != "") {
        // filter images
        var images = document.getElementsByClassName("image");
        for (let index = 0; index < images.length; index++) {
            const image = images[index];
            // get id for filtering
            let image_id = image.id;
            // formatting id
            image_id = image_id.toLowerCase();
            image_id = image_id.replace("_", " ");
            // let regex = RegExp(".*" + filter_value + ".*", 'i');
            if (image_id.includes(filter_value)) {
                image.style.display = "inital";
            } else {
                image.style.display = "none";
            }
        }
    }
}