function navigation_button(button) {
    button.classList.toggle("change");
    if (button.classList.contains("change")) {
        alert("Going Down");
        button.style.height = "100%";
    } else {
        alert("Going Up");
        button.style.height = "0%";
    }
  } 