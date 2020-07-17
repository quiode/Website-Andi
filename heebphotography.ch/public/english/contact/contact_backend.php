<!DOCTYPE html>
<html>

<head>
    <title>Processing</title>
</head>

<body>
    <?php
    // print_r($_POST);
    // makes the message which is send per mail
    $subject .= ($_POST["first_name"] != "") ? $_POST["first_name"] : "NoFirstNameGiven";
    $subject .= " ";
    $subject .= ($_POST["last_name"] != "") ? $_POST["last_name"] : "NoLastNameGiven";
    $subject .= " writes about the subject: ";
    $subject .= ($_POST["subject"] != "custom") ? $_POST["subject"] : $_POST["custom_subject"];
    $subject .= ". ";
    $subject .= ($_POST["how_to_contact"] != "anonymous") ? ("You can reach him via " . $_POST["how_to_contact"] . " under " . $_POST[$_POST["how_to_contact"]] . ".") : "No information on how to contact is given.";
    // echo "<br>";
    // echo $subject;
    // the header (sender, return, cc, just more information)
    // makes the mail which the messages was sent from depending on the user input
    $mail = ($_POST["first_name"] != "") ? $_POST["first_name"] : "NoFirstNameGiven";
    $mail .= " ";
    $mail .= ($_POST["last_name"] != "") ? $_POST["last_name"] : "NoLastNameGiven";
    $mail .= " <";
    $mail .= $_POST["mail"];
    $mail .= ">";
    $mail = ($_POST["mail"] != "") ? $mail : "Contact Form <admin@heebphotography.ch>";

    $headers .= "Reply-To: " . $mail . "\r\n";
    $headers .= "Return-Path: " . $mail . "\r\n";
    $header = "From: " . $mail;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

    // echo "<br>";
    // sends mail and sais if it succeeded or failed
    if (mail("andreas.heeb@heebphotography.ch", $subject, $_POST["message"], $header)) {
        echo "SUCCESS!";
    } else {
        echo "ERROR!";
    }
    //     echo "<br>";
    // if (mail("domi.schwaiger04@gmail.com", "test", "test", "From: <domi.schwaiger04@gmail.com>")) {
    //     echo "SUCCESS!2";
    // } else {
    //     echo "ERROR!2";
    // }

        // $to = "domi.schwaiger04@gmail.com";
        // $subject = "My subject";
        // $txt = "Hello world!";
        // $headers = "From: webmaster@example.com" . "\r\n" .
        // "CC: somebodyelse@example.com";

        // if (mail($to, $subject, $message, $headers)) {
        //     echo "yey";
        // } else {
        //     echo ":(";
        // }
    ?>
</body>

</html>
