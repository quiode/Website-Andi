function navigation_button(button) {
    button.classList.toggle("change");
    var navigation = document.getElementById("navigation");
    if (button.classList.contains("change")) {
        alert("Going Down");
        navigation.style.height = "100%";
    } else {
        alert("Going Up");
        navigation.style.height = "0%";
    }
  } 