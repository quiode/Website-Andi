<!DOCTYPE html>
<html>

    <head>
        <title>Processing</title>
    </head>

    <body>
        <?php
//shows errors/debugging
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
//makes the message which is send per mail in plain text
        $plain = ($_POST["first_name"] != "") ? strip_tags($_POST["first_name"]) : "NoFirstNameGiven";
        $plain .= " ";
        $plain .= ($_POST["last_name"] != "") ? strip_tags($_POST["last_name"]) : "NoLastNameGiven";
        $plain .= " writes about the subject: ";
        $plain .= ($_POST["subject"] != "custom") ? strip_tags($_POST["subject"]) : strip_tags($_POST["custom_subject"]);
        $plain .= ". ";
        $plain .= "You can reach him via mail under " . strip_tags($_POST["email"]);
//message of the email
    //h1
        $message = "<h1>This message is automated!</h1>";
    //h2
        $message .= "<h2>It was created through the Form on " . $_SERVER["HTTP_HOST"] . " by <b>";
        $message .= ($_POST["first_name"] != "") ? strip_tags($_POST["first_name"]) : "NoFirstNameGiven";
        $message .= " ";
        $message .= ($_POST["last_name"] != "") ? strip_tags($_POST["last_name"]) : "NoLastNameGiven";
        $message .= "</b>.</h2>";
    //h3
        $message .= "<h3>The reason: <b>";
        $message .= ($_POST["subject"] != "custom") ? strip_tags($_POST["subject"]) : strip_tags($_POST["custom_subject"]);
        $message .= "</b>.</h3><h4>";
    //h4
        $message .= "You can reach him via <b>" . "mail" . "</b> under <b>" . strip_tags($_POST["email"]) . "</b>.</h4>";
    //h5
        $message .= "<h5>The following is the message from the user:</h5>";
    //p
        $message .= "<p>" . strip_tags($_POST["message"]) . "</p>";
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
        $mail->Subject = "Contact Form: " . strip_tags($_POST["subject"]);
        $mail->Body = $message;
        $mail->AltBody = $plain . "&NewLine;The message:&NewLine;" . strip_tags($_POST["message"]);
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
                    "height=200,width=200,resizable=no,left=200,top=200,location=no,menubar=no,scrollbar=no"
                )

                function close_success_window() {
                    success_window.close()
                }
                setTimeout(close_success_window, 1000);
            } else {
                var error_window = window.open("https://en.heebphotography.ch/contact/images/error_200px.png", "Error",
                    "height=200,width=200,resizable=no,left=200,top=200,location=no,menubar=no,scrollbar=no"
                )

                function close_error_window() {
                    error_window.close()
                }
                setTimeout(close_error_window, 1000);
            }

            function open_starting_window() {
                window.open("https://en.heebphotography.ch", "_self");
            }
            setTimeout(open_starting_window, 1050);
        </script>
    </body>

</html>
