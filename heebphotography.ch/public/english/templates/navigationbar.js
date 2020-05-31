function navigation_button(button) {
    button.classList.toggle("change");
    if (button.classList.contains("change")) {
        alert("Going Up");
    } else {
        alert("Going Down");
    }
  } 