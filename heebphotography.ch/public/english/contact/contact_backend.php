<!DOCTYPE html>
<html>

<head>
    <title>Processing</title>
</head>

<body>
    <?php
//shows errors
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
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
        $message .= "<h3>The reason for this is <b>";
        $message .= ($_POST["subject"] != "custom") ? $_POST["subject"] : $_POST["custom_subject"];
        $message .= " </b>.</h3><h4>";
    //h4
        $message .= ($_POST["how_to_contact"] != "anonymous") ? ("You can reach him via <b>" . $_POST["how_to_contact"] . "</b> under <b>" . $_POST[$_POST["how_to_contact"]] . "</b>.</h4>") : "No information on how to contact is given.</h4>";
    //h5
        $message .= "<h5>The following is the message from the user:</h5>";
    //p
        $message .= "<p>" . $_POST["message"] . "</p>";
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
    $mail->addReplyTo("contact.form.heebphotography@gmail.com", "Reply");   //Replyier(?)
//the actual content of the email
    //sends html
    $mail->isHTML(true);
    $mail->Subject = "Contact Form: " . $_POST["subject"];
    $mail->Body = $message;
    $mail->AltBody = $plain . "&NewLine;The message:&NewLine;" . $_POST["message"];
//sends the actual email
    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    ?>
</body>

</html>
