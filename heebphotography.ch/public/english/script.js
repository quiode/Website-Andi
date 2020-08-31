/*document.onload = function slideshow() {
  showSlides();
}

function showSlides() {
  var slideIndex = 1;

  var slides = document.getElementsByClassName("slide");
  //speichert alle slides in einem array    
  
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    //macht alle slides unsichtbar
    slideIndex++;    
    
    if (slideIndex > slides.length) { 
      slideIndex = 1;  
      //um Index zu resetten wenn er grösser als die Anzahl Bilder wird                                      
    }      
    
    slides[slideIndex - 1].style.display = "block";
    //macht eine Slide sichtbar
    setTimeout(showSlides, 10000);
  }
}*/

function slideshow(sliding_time) {
	// gets the slides
	var slides = document.getElementsByClassName("slide");

	// makes a list of all the src of the images
	var all_img_src = [];
	for (let i = 0; i < slides.length; i++) {
		all_img_src.push(slides[i].src);
	}
	alert(all_img_src);

	// the slideshow
	slides.forEach(slide => {
		setTimeout(() => {
			slide.style.opacity = 1;
			if (all_img_src.indexOf(slide.src) == 0) {
				slides[all_img_src.length - 1].style.opacity = 0;
			} else {
				slides[all_img_src.indexOf(slide.src) - 1].style.opacity = 0;
			}
		}, sliding_time);
	});
	slideshow(sliding_time);
}