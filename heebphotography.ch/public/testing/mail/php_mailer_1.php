<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . "/../../../../../vendor/autoload.php";

define('GUSER', 'contact.form.heebphotography@gmail.com'); // GMail username
define('GPWD', 'J7lo92nfoVcb'); // GMail password

function smtpmailer($to, $from, $from_name, $subject, $body)
{
    global $error;
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //shows stuff for debuging
    $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if (!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}

if (smtpmailer('domi.schwaiger04@gmail.com', GUSER, 'Contact Form', 'test mail message', 'Hello World!')) {
    echo "Success!";
}
if (!empty($error)) {
    echo $error;
}
