<!DOCTYPE html>
<html>

<head>
    <title>Processing</title>
</head>

<body>
    <?php
    // makes the message which is send per mail
    $subject = ($_POST["first_name"] != "") ? $_POST["first_name"] : "NoFirstNameGiven";
    $subject .= " ";
    $subject .= ($_POST["last_name"] != "") ? $_POST["last_name"] : "NoLastNameGiven";
    $subject .= " writes about the subject: ";
    $subject .= ($_POST["subject"] != "custom") ? $_POST["subject"] : $_POST["custom_subject"];
    $subject .= ". ";
    $subject .= ($_POST["how_to_contact"] != "anonymous") ? ("You can reach him via " . $_POST["how_to_contact"] . " under " . $_POST[$_POST["how_to_contact"]] . ".") : "No information on how to contact is given.";
    // the header (sender, return, cc, just more information)
    // makes the mail which the messages was sent from depending on the user input
    // $email = ($_POST["first_name"] != "") ? $_POST["first_name"] : "NoFirstNameGiven";
    // $email .= " ";
    // $email .= ($_POST["last_name"] != "") ? $_POST["last_name"] : "NoLastNameGiven";
    // $email .= " <";
    // $email .= $_POST["email"];
    // $email .= ">";
    // $email = ($_POST["email"] != "") ? $email : "Contact Form <admin@heebphotography.ch>";
    $email = "Contact Form <admin@heebphotography.ch>";
    // the headers
    $header = "Reply-To: " . $email . "\r\n";
    $header .= "Return-Path: Contact Form <admin@heebphotography.ch>\r\n";
    $header .= "From: " . $email . "\r\n";
    $header .= "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $header .= "X-Mailer: PHP". phpversion() ."\r\n";
    // where the mail is send to
    $to = "Andreas Heeb <andreas.heeb@heebphotography.ch";
    echo $header . ";" . $subject . ";";
    print_r($_POST);
    print_r($email);
    // sends mail and sais if it succeeded or failed
    if (mail($to, $subject, $_POST["message"], $header)) {
        echo "SUCCESS!";
    } else {
        echo "ERROR!";
    }
    ?>
</body>

</html>
