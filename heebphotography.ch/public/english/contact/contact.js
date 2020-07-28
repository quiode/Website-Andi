function form_normal() {
    document.getElementById("mail_status").style.display = "none";
    document.getElementById("green_check").style.display = "none";
    document.getElementById("loading_gif").style.display = "inherit";
    document.getElementById("red_x").style.display = "inherit";
}

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