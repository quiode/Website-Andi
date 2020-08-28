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
  var slides = document.getElementsByClassName("slide");

  for (var i = 0; i <= slides.length; i++) {
    if (i == slides.Length) {
      i = 0;
    }
    slides[i].style.display = "block";
    slides[i - 1].style.display = "none";
    setTimeout(slideshow, 10000);
  }
}