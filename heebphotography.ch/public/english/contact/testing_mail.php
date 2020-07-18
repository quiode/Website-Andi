<!DOCTYPE html>
<html>

<head>
    <title>Processing</title>
</head>

<body>
    <?php
// shows errors
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
// imports all components
    set_include_path("./PHPMailer-master");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "./PHPMailer-master/src/" . "Exception.php";
    require "./PHPMailer-master/src/" . "PHPMailer.php";
    require "./PHPMailer-master/src/" . "SMTP.php";

//PHPMailer Object
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions
// SMTP Server
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.migadu.com"; // sets the SMTP server
    $mail->Port       = 587;                    // set the SMTP port
    $mail->SMTPSecure = 'tls';
    $mail->Username   = "admin@heebphotography.ch"; // SMTP account username
    $mail->Password   = "5gP4!chH#BMtfCF";        // SMTP account password
//From email address and name
    $mail->From = "admin@heebphotography.ch";
    // $mail->FromName = "Contact Form";
//To address and name
    $mail->addAddress("domi.schwaiger04@gmail.com"); //Recipient
//Address to which recipient will reply
    $mail->addReplyTo("admin@heebphotography.ch", "Reply");
//Send HTML or Plain Text email
    $mail->isHTML(true);
    $mail->Subject = "Testing PHP Mailer";
    $mail->Body = "<i>Mail body in HTML</i>";
    $mail->AltBody = "This is the plain text version of the email content";
// sends the actual email
    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    ?>
</body>

</html>
