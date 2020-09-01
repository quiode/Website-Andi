// the normal layout of the form
function form_normal() {
    document.getElementById("mail_status").style.display = "none";
    document.getElementById("green_check").style.display = "none";
    document.getElementById("loading_gif").style.display = "inherit";
    document.getElementById("red_x").style.display = "inherit";
}

// when the form is beeing submitted, displays processing information
function form_submit() {
    var loading_window = window.open("https://en.heebphotography.ch/contact/images/sending_image.gif",
        "Sending",
        "height=200,width=200,resizable=off,left=200,top=200");
}

// when changing an option, display another input field
function contact_changed() {
    // changed the display of all contact input field to none
    Array.from(document.getElementsByClassName("email")).forEach(element => {
        element.style.display = "none";
        element.required = false;
    });
    Array.from(document.getElementsByClassName("phone")).forEach(element => {
        element.style.display = "none";
        element.required = false;
    });
    Array.from(document.getElementsByClassName("instagram")).forEach(element => {
        element.style.display = "none";
        element.required = false;
    });
    // sets the right input field display to block
    Array.from(document.getElementsByClassName(document.getElementById("how_to_contact").value)).forEach(element => {
        element.style.display = "initial";
        element.required = true;
    });
}

// makes an input field when custom subject is selected
function subject_changed() {
    if (document.getElementById("subject").value == "custom") {
        Array.from(document.getElementsByClassName("custom_subject")).forEach(element => {
            element.style.display = "initial";
            element.required = true;
        });
    } else {
        Array.from(document.getElementsByClassName("custom_subject")).forEach(element => {
            element.style.display = "none";
            element.required = false;
        });
    }
}