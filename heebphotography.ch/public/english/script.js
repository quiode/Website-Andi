// calls the slideshow fuction, which changes the image, every 5 seconds
var slideshow_interval = setInterval(slideshow, 5000);

// changes the image
function slideshow() {
	var device_slides = picture_orientation();
	// when the document has fully loaded, begin with slideshow
	if (document.readyState == "complete") {
		// gets every slide image
		var slides = document.getElementsByClassName(device_slides);
		// finds the slide image which is currently shown
		for (let index = 0; index < slides.length; index++) {
			if (window.getComputedStyle(slides[index]).getPropertyValue("opacity") == 1) { //fuck javascript
				current_slide = slides[index];
			}
		}
		// select a new slide image
		var new_slide = current_slide;
		while (new_slide == current_slide) {
			new_slide = slides[Math.floor(Math.random() * slides.length)];
		}
		// lets the current slide disappear and shows the new slide slide
		current_slide.style.opacity = 0;
		new_slide.style.opacity = 1;
	}
}
// detects the device orientation and changed the pictures
function picture_orientation() {
	alert(navigator.userAgent);
	var orientation = (screen.orientation || {}).type || screen.mozOrientation || screen.msOrientation; // gets tbe screen orientation
	if (orientation != "portrait-primary" && orientation != "portrait-secondary" && orientation != "landscape-primary" && orientation != "landscape-secondary") {
		for (let index = 0; index < document.getElementsByClassName("portrait_slides").length; index++) {
			const element = document.getElementsByClassName("portrait_slides")[index];
			element.style.display = "block";
		}
		for (let index = 0; index < document.getElementsByClassName("landscape_slides").length; index++) {
			const element = document.getElementsByClassName("landscape_slides")[index];
			element.style.display = "none";
		}
		return "portrait_slides";
	}

	if (orientation == "portrait-primary" || orientation == "portrait-secondary") {
		for (let index = 0; index < document.getElementsByClassName("portrait_slides").length; index++) {
			const element = document.getElementsByClassName("portrait_slides")[index];
			element.style.display = "block";
		}
		for (let index = 0; index < document.getElementsByClassName("landscape_slides").length; index++) {
			const element = document.getElementsByClassName("landscape_slides")[index];
			element.style.display = "none";
		}
		return "portrait_slides";
	} else if (orientation == "landscape-primary" || orientation == "landscape-secondary") {
		for (let index = 0; index < document.getElementsByClassName("portrait_slides").length; index++) {
			const element = document.getElementsByClassName("portrait_slides")[index];
			element.style.display = "none";
		}
		for (let index = 0; index < document.getElementsByClassName("landscape_slides").length; index++) {
			const element = document.getElementsByClassName("landscape_slides")[index];
			element.style.display = "block";
		}
		return "landscape_slides";
	}
}