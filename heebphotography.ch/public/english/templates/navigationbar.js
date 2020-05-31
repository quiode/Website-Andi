function navigation_button(button) {
    button.classList.toggle("change");
    var navigation = document.getElementById("navigation-overlay");
    if (button.classList.contains("change")) {
        // alert("Going Down");
        navigation.style.height = "100%";
        document.getElementById("b1").style.backgroundColor = "rgb(255,255,255)"
        document.getElementById("b2").style.backgroundColor = "rgb(255,255,255)"
        document.getElementById("b3").style.backgroundColor = "rgb(255,255,255)"
    } else {
        // alert("Going Up");
        navigation.style.height = "0%";
        document.getElementById("b1").style.backgroundColor = "rgb(0,0,0)"
        document.getElementById("b2").style.backgroundColor = "rgb(0,0,0)"
        document.getElementById("b3").style.backgroundColor = "rgb(0,0,0)"
    }
  } 