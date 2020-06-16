//  resizes the image depending on its height/width and the width/height of the window
function resizeToMax() {
    myImage = new Image()
    var img = document.getElementById("slideshow_image");
    if (img.src.width / document.body.clientWidth > img.src.height / document.body.clientHeight) {
        img.style.width = "100%";
    } else {
        img.style.height = "100%";
    }
}

function slideshow_on(_src) {
    
}