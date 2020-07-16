<!DOCTYPE html>
<html>

    <head>
        <title>Processing</title>
    </head>

    <body>
        <?php
        // print_r($_POST);
        // // makes the message which is send per mail
        // $subject .= ($_POST["first_name"] != "") ? $_POST["first_name"] : "NoFirstNameGiven";
        // $subject .= " ";
        // $subject .= ($_POST["last_name"] != "") ? $_POST["last_name"] : "NoLastNameGiven";
        // $subject .= " writes about the subject: ";
        // $subject .= ($_POST["subject"] != "custom") ? $_POST["subject"] : $_POST["custom_subject"];
        // $subject .= ". ";
        // $subject .= ($_POST["how_to_contact"] != "anonymous") ? ("You can reach him via " . $_POST["how_to_contact"] . " under " . $_POST[$_POST["how_to_contact"]] . ".") : "No information on how to contact is given.";
        // echo "<br>";
        // echo $subject;
        // $header = ($_POST["how_to_contact"] = "email") ? "From: <" . $_POST[$_POST["how_to_contact"]] . ">" : "From: <admin@heebphotography.ch>";
        // echo "<br>";
        // if (mail("andreas.heeb@heebphotography.ch", $subject, $_POST["message"], $header)) {
        //     echo "SUCCESS!";
        // } else {
        //     echo "ERROR!";
        // }
        // echo "<br>";
        // if (mail("domi.schwaiger04@gmail.com", "test", "test", "From: <domi.schwaiger04@gmail.com>")) {
        //     echo "SUCCESS!2";
        // } else {
        //     echo "ERROR!2";
        // }

        $to = "domi.schwaiger04@gmail.com";
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "yey";
        } else {
            echo ":(";
        }
        ?>
    </body>

</html>
