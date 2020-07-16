function navigation_button(button) {
    // starts transformation from to button either from cross to lines or lines to cross
    button.classList.toggle("change");
    // selects the background
    var navigation = document.getElementById("navigation-overlay");
    if (button.classList.contains("change")) {
        // starts transformation --> element goes down
        navigation.style.height = "100%";
        // makes the cross black when the background gets whiter
        document.getElementById("b1").style.backgroundColor = "rgb(255,255,255)";
        document.getElementById("b1").style.border = "1px white solid";
        document.getElementById("b1").style.width = "70px";
        document.getElementById("b1").style.height = "10px";

        document.getElementById("b2").style.backgroundColor = "rgb(255,255,255)";
        document.getElementById("b2").style.border = "1px white solid";
        document.getElementById("b2").style.width = "70px";
        document.getElementById("b2").style.height = "10px";

        document.getElementById("b3").style.backgroundColor = "rgb(255,255,255)";
        document.getElementById("b3").style.border = "1px white solid";
        document.getElementById("b3").style.width = "70px";
        document.getElementById("b3").style.height = "10px";

        document.getElementsByTagName("body")[0].style.overflow = "hidden";
    } else {
        // starts transformation --> elements goes up
        navigation.style.height = "0%";
        // makes the cross white when the background gets darker
        document.getElementById("b1").style.backgroundColor = "rgb(0,0,0)";
        document.getElementById("b1").style.border = "none";
        document.getElementById("b1").style.width = "72px";
        document.getElementById("b1").style.height = "12px";
        
        document.getElementById("b2").style.backgroundColor = "rgb(0,0,0)";
        document.getElementById("b2").style.border = "none";
        document.getElementById("b2").style.width = "72px";
        document.getElementById("b2").style.height = "12px";
        
        document.getElementById("b3").style.backgroundColor = "rgb(0,0,0)";
        document.getElementById("b3").style.border = "none";
        document.getElementById("b3").style.width = "72px";
        document.getElementById("b3").style.height = "12px";

        document.getElementsByTagName("body")[0].style.overflow = "auto";
    }
}