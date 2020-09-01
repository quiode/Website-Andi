<!DOCTYPE html>
<html>

    <head>
        <title>Processing</title>
    </head>

    <body>
        <!-- <div id="mail_status">
        <p id="mail_status_message">Please wait...</p>
        <img src="./images/loading.gif" alt="loading_gif" id="loading_gif">
        <img src="./images/1200px-Light_green_check.svg.png" alt="green_check" id="green_check">
        <img src="./images/Red_X.svg.png" alt="red_X" id="red_x">
    </div> -->

        <?php
//shows errors/debugging
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

    // print_r($_POST);
//makes the message which is send per mail in plain text
        $plain = ($_POST["first_name"] != "") ? $_POST["first_name"] : "NoFirstNameGiven";
        $plain .= " ";
        $plain .= ($_POST["last_name"] != "") ? $_POST["last_name"] : "NoLastNameGiven";
        $plain .= " writes about the subject: ";
        $plain .= ($_POST["subject"] != "custom") ? $_POST["subject"] : $_POST["custom_subject"];
        $plain .= ". ";
        $plain .= ($_POST["how_to_contact"] != "anonymous") ? ("You can reach him via " . $_POST["how_to_contact"] . " under " . $_POST[$_POST["how_to_contact"]] . ".") : "No information on how to contact is given.";
//message of the email
    //h1
        $message = "<h1>This message is automated!</h1>";
    //h2
        $message .= "<h2>It was created through the Form on " . $_SERVER["HTTP_HOST"] . " by <b>";
        $message .= ($_POST["first_name"] != "") ? $_POST["first_name"] : "NoFirstNameGiven";
        $message .= " ";
        $message .= ($_POST["last_name"] != "") ? $_POST["last_name"] : "NoLastNameGiven";
        $message .= "</b>.</h2>";
    //h3
        $message .= "<h3>The reason: <b>";
        $message .= ($_POST["subject"] != "custom") ? $_POST["subject"] : $_POST["custom_subject"];
        $message .= "</b>.</h3><h4>";
    //h4
        $message .= ($_POST["how_to_contact"] != "anonymous") ? ("You can reach him via <b>" . $_POST["how_to_contact"] . "</b> under <b>" . $_POST[$_POST["how_to_contact"]] . "</b>.</h4>") : "No information on how to contact is given.</h4>";
    //h5
        $message .= "<h5>The following is the message from the user:</h5>";
    //p
        $message .= "<p>" . $_POST["message"] . "</p>";
    //footer
        $message .= "<footer><b>Please do not reply to this message!</b></footer>";
//imports all components
        set_include_path("./PHPMailer-master");

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require "./PHPMailer-master/src/" . "Exception.php";
        require "./PHPMailer-master/src/" . "PHPMailer.php";
        require "./PHPMailer-master/src/" . "SMTP.php";
//PHPMailer Object
        $mail = new PHPMailer(true); //Argument true in constructor enables exceptions
//SMTP Server
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
        $mail->Port       = 587;                    // sets the SMTP port
        $mail->SMTPSecure = 'tls';                  // TLS/SSL
        $mail->Username   = "contact.form.heebphotography@gmail.com"; // SMTP account username
        $mail->Password   = "Yw63Bf#@uK@t%P7";        // SMTP account password
//From email address and name
        $mail->From = "contact.form.heebphotography@gmail.com";     //sender address
        $mail->FromName = "Contact Form";   //sender name
//To address and name
        $mail->addAddress("andreas.heeb@heebphotography.ch"); //Recipient
//Address to which recipient will reply
        $mail->addReplyTo("contact.form.heebphotography@gmail.com", "Contact Form");   //Replyier(?)
//the actual content of the email
    //sends html
        $mail->isHTML(true);
        $mail->Subject = "Contact Form: " . $_POST["subject"];
        $mail->Body = $message;
        $mail->AltBody = $plain . "&NewLine;The message:&NewLine;" . $_POST["message"];
//sends the actual email
        try {
            $mail->send();
            // sends the status of the mail sending process to javascript
            echo <<<EOT
            <script>
            sessionStorage.setItem("mail_status", "true");
            </script>
            EOT;
        } catch (Exception $e) {
            // sends the status of the mail sending process to javascript
            echo <<<EOT
            <script>
            sessionStorage.setItem("mail_status", "false");
            sessionStorage.setItem("mail_error", $mail->ErrorInfo);
            </script>
            EOT;
        }
        ?>
        <!-- closes the window -->
        <script>
            var loading_window = window.open('', 'Sending');
            loading_window.close();
            if (sessionStorage.getItem("mail_status")) {
                var success_window = window.open("https://en.heebphotography.ch/contact/images/ok_200px.png", "Success",
                    "height=200,width=200,resizable=off,left=200,top=200")
                setTimeout(success_window.close(), 5000);
            } else {
                var error_window = window.open("https://en.heebphotography.ch/contact/images/error_200px.png", "Error",
                    "height=200,width=200,resizable=off,left=200,top=200")
                setTimeout(error_window.close(), 5000);
            }
            window.open("https://en.heebphotography.ch", "_self");
        </script>
    </body>

</html>