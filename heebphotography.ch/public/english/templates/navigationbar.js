function navigation_button(button) {
    // starts transformation from to button either from cross to lines or lines to cross
    button.classList.toggle("change");
    document.getElementById("navigation_button").style.backgroundColor = "#000";
    // selects the background
    var navigation = document.getElementById("navigation-overlay");
    if (button.classList.contains("change")) {
        // starts transformation --> element goes down
        navigation.style.height = "100%";
        // makes the cross black when the background gets whiter
        document.getElementById("b1").style.backgroundColor = "rgb(255,255,255)";
        document.getElementById("b2").style.backgroundColor = "rgb(255,255,255)";
        document.getElementById("b3").style.backgroundColor = "rgb(255,255,255)";
        document.getElementById("navigation_button").style.backgroundColor = "none";
        document.getElementsByTagName("body")[0].style.overflow = "hidden";
    } else {
        // starts transformation --> elements goes up
        navigation.style.height = "0%";
        // makes the cross white when the background gets darker
        document.getElementById("b1").style.backgroundColor = "rgb(0,0,0)";
        document.getElementById("b2").style.backgroundColor = "rgb(0,0,0)";
        document.getElementById("b3").style.backgroundColor = "rgb(0,0,0)";
        document.getElementById("navigation_button").style.backgroundColor = "#fff";
        document.getElementsByTagName("body")[0].style.overflow = "auto";
    }
}