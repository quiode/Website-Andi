<!DOCTYPE html>
<html>

<head>
    <title>Processing</title>
</head>

<body>
    <?php
    echo "hi";
// shows errors
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
// imports all components
    set_include_path("./PHPMailer-master");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    echo "hi";
    require "./PHPMailer-master/src/" . "Exception.php";
    require "./PHPMailer-master/src/" . "PHPMailer.php";
    require "./PHPMailer-master/src/" . "SMTP.php";
    echo "hi";

//PHPMailer Object
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
    $mail->From = "admin@heebphotography.ch";
    $mail->FromName = "Contact Form";

//To address and name
    $mail->addAddress("domi.schwaiger04@gmail.com", "Dominik Schwaiger");
    // $mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
    $mail->addReplyTo("admin@heebphotography.ch", "Reply");

//Send HTML or Plain Text email
    $mail->isHTML(true);

    $mail->Subject = "Testing PHP Mailer";
    $mail->Body = "<i>Mail body in HTML</i>";
    $mail->AltBody = "This is the plain text version of the email content";

    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    echo "hi";
    ?>
</body>

</html>
