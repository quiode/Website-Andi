// looks for a change in the local storage, if it detects, does something
window.addEventListener("storage", () => {
    // when the form is beeing submitted, it gives a response to the use if the message has been sent or an error has been occurred
    alert("one");
    if (localStorage.getItem("finished")) {
        alert("1");
        if (localStorage.getItem("mail_status")) {
            document.getElementById("mail_status_message").innerHTML = "Form has successfully been sent!";
            document.getElementById("green_check").style.display = "inherit";
            document.getElementById("loading_gif").style.display = "none";
            alert("yey");
            setTimeout(form_normal(), 5000);
        } else {
            document.getElementById("mail_status_message").innerHTML = "An Error has occurred:" + localStorage.getItem("mail_error");
            document.getElementById("red_x").style.display = "inherit";
            document.getElementById("loading_gif").style.display = "none";
            setTimeout(form_normal(), 5000);
            alert("ney");
        }
        localStorage.clear();
        alert("two");
    }
    alert("2");
})

// the normal layout of the form
function form_normal() {
    document.getElementById("mail_status").style.display = "none";
    document.getElementById("green_check").style.display = "none";
    document.getElementById("loading_gif").style.display = "inherit";
    document.getElementById("red_x").style.display = "inherit";
}

// when the form is beeing submitted, displays processing information
function form_submit() {
    document.getElementById("mail_status").style.display = "initial";
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