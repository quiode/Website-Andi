function navigation_button(button) {
    button.classList.toggle("change");
    var navigation = document.getElementById("navigation-overlay");
    if (button.classList.contains("change")) {
        // alert("Going Down");
        navigation.style.height = "100%";
        document.getElementById("b1").style.backgroundColor = "white"
        document.getElementById("b3").style.backgroundColor = "white"
    } else {
        // alert("Going Up");
        navigation.style.height = "0%";
        document.getElementById("b1").style.backgroundColor = "black"
        document.getElementById("b3").style.backgroundColor = "black"
    }
  } 