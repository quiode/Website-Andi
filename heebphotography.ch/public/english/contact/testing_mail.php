<!DOCTYPE html>
<html>

<head>
    <title>Processing</title>
</head>

<body>
    <?php
// for testing
    // echo php_ini_loaded_file();
// imports all components
    // echo "1"; //for testing

    set_include_path("PHPMailer-master");

    // echo "2"; //for testing

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "PHPMailer-master" . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Exception.php";
    require $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "PHPMailer-master" . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "PHPMailer.php";
    require $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "PHPMailer-master" . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "SMTP.php";

    // echo "3"; //for testing

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

//CC and BCC
    // $mail->addCC("cc@example.com");
    // $mail->addBCC("bcc@example.com");

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

    // echo "4"; //for testing
    ?>
</body>

</html>
