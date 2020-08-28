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

document.onload = function slideshow() {
  var slideIndex = 0;
  showSlides();
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mslide");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) { slideIndex = 1 }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}