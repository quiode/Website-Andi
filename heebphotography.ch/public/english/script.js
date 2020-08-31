function slideshow(sliding_time) {
	// gets the slides
	var slides = document.getElementsByClassName("slide");
	alert("hui");
	// makes a list of all the src of the images
	var all_img_src = [];
	for (let i = 0; i < slides.length; i++) {
		alert(slides[i].src);
		all_img_src.push(slides[i].src);
		alert(slides[i].src);
	}

	// // the slideshow
	// slides.forEach(slide => {
	// 	setTimeout(() => {
	// 		slide.style.opacity = 1;
	// 		if (all_img_src.indexOf(slide.src) == 0) {
	// 			slides[all_img_src.length - 1].style.opacity = 0;
	// 		} else {
	// 			slides[all_img_src.indexOf(slide.src) - 1].style.opacity = 0;
	// 		}
	// 	}, sliding_time);
	// });
}