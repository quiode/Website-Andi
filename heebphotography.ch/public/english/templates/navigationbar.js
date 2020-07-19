function navigation_button(button) {
    // starts transformation from to button either from cross to lines or lines to cross
    button.classList.toggle("change");
    // selects the background
    var navigation = document.getElementById("navigation-overlay");
    if (button.classList.contains("change")) {
        // starts transformation --> element goes down
        navigation.style.height = "100%";
        document.getElementsByTagName("body")[0].style.overflow = "hidden";
    } else {
        // starts transformation --> elements goes up
        navigation.style.height = "0%";
        document.getElementsByTagName("body")[0].style.overflow = "auto";
    }
}