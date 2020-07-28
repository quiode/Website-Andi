function form_normal() {
    document.getElementById("mail_status").style.display = "none";
    document.getElementById("green_check").style.display = "none";
    document.getElementById("loading_gif").style.display = "inherit";
    document.getElementById("red_x").style.display = "inherit";
}

// when the form is beeing submitted, it gives a response to the use if the message has been sent or an error has been occurred
function form_submit() {
    document.getElementById("mail_status").style.display = "block";
    while (true) {
        if (sessionStorage.getItem("finished")) {
            if (sessionStorage.getItem("mail_status")) {
                document.getElementById("mail_status_message").innerHTML = "Form has successfully been sent!";
                document.getElementById("green_check").style.display = "inherit";
                document.getElementById("loading_gif").style.display = "none";
                setTimeout(form_normal(), 5000);
            } else {
                document.getElementById("mail_status_message").innerHTML = "An Error has occurred:" + sessionStorage.getItem("mail_error");
                document.getElementById("red_x").style.display = "inherit";
                document.getElementById("loading_gif").style.display = "none";
                setTimeout(form_normal(), 5000);
            }
        } else {

        }
    }
}

// when changing an option, display another input field
function contact_changed() {
    // changed the display of all contact input field to none
    document.getElementsByClassName("email").forEach(element => {
        element.style.display = "none";
    });
    document.getElementsByClassName("phone").forEach(element => {
        element.style.display = "none";
    });
    document.getElementsByClassName("instagram").forEach(element => {
        element.style.display = "none";
    });
    // sets the right input field display to block
    switch (document.getElementById("how_to_contact").value) {
        case "email":
            document.getElementsByClassName("email").forEach(element => {
                element.style.display = "block";
            });
            break;
        case "phone":
            document.getElementsByClassName("phone").forEach(element => {
                element.style.display = "block";
            });
            break;
        case "instagram":
            document.getElementsByClassName("instagram").forEach(element => {
                element.style.display = "block";
            });
            break;
        default:
            break;
    }
}