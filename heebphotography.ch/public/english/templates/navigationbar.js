function navigation_button(button) {
    button.classList.toggle("change");
    var classList = this.className.split(' ')
    if (classList.length != 1) {
        alert("Navigation Bar Active");
    } else {
        alert("Navigation Bar not active");
    }
  } 