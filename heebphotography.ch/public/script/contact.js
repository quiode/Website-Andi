// the normal layout of the form
function form_normal() {
    document.getElementById("mail_status").style.display = "none";
    document.getElementById("green_check").style.display = "none";
    document.getElementById("loading_gif").style.display = "inherit";
    document.getElementById("red_x").style.display = "inherit";
}

// when the form is beeing submitted, displays processing information
function form_submit() {
    var loading_window = window.open("https://heebphotography.ch/public/images/contact/sending_image.gif",
        "Sending",
        "height=200,width=200,resizable=no,left=200,top=200,location=no,menubar=no,scrollbar=no");
}

// makes an input field when custom subject is selected
function subject_changed() {
    if (document.getElementById("subject").value == "custom") {
        Array.from(document.getElementsByClassName("custom_subject")).forEach(element => {
            element.style.display = "inherit";
            element.required = true;
        });
    } else {
        Array.from(document.getElementsByClassName("custom_subject")).forEach(element => {
            element.style.display = "none";
            element.required = false;
        });
    }
}