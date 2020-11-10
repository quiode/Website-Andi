<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kontakt | Tierfotografie Andreas Heeb</title>
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script src="https://heebphotography.ch/public/script/contact.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="https://heebphotography.ch/public/images/favicon/favicon.ico"/>
    </head>

    <body id="contact_form">
        <!-- wip bar -->
        <?php require __DIR__ . "/../../templates/work_in_progress.php"?>
        <?php require __DIR__ . "/../../templates/header.php"?>
        <!-- the contact form, you can leave a lot empty and just send it anonymous -->
        <form action="./contact_backend.php" method="POST" onsubmit="form_submit()">
            <!-- email -->
            <label for="email" class="email">Email:</label>
            <input type="email" id="email" class="email" name="email" placeholder="example@example.com" maxlength="256"
                title="beispiel@beispiel.com">
            <!-- first name label -->
            <label for="first_name">Vorname:</label>
            <!-- first name -->
            <input type="text" id="first_name" name="first_name" maxlength="256" autocomplete="on"
                placeholder="Anonym" title="FirstName">
            <!-- last name label-->
            <label for="last_name">Nachname:</label>
            <!-- last name -->
            <input type="text" id="last_name" name="last_name" maxlength="256" autocomplete="on" placeholder="Anonym"
                title="LastName">
            <!-- Subject -->
            <label for="subject">Grund:</label>
            <select name="subject" id="subject" onchange="subject_changed()">
                <option value="bug">Bug</option>
                <option value="copyright_question">Urheberrechtsfrage</option>
                <option value="photography_question">Fotografiefrage</option>
                <option value="animal_question">Frage über Tiere</option>
                <option value="business_question">Geschäftliche Frage</option>
                <!-- <option value="bored">I'm bored and just wanna talk</option> -->
                <option value="custom">Etwas Anderes</option>
            </select>
            <!-- custom subject -->
            <label for="custom_subject" class="custom_subject">Bitte erläutern Sie:</label>
            <input type="text" id="custom_subject" class="custom_subject" name="custom_subject" maxlength="256"
                autocomplete="off" title="Subject" autofocus>
            <!-- the actual message -->
            <label for="message" class="message">Nachricht:</label>
            <textarea rows="5" cols="100" type="text" id="message" name="message" class="message" maxlength="1000"
                autocomplete="off" title="Message" required></textarea>
            <!-- submit button -->
            <input id="submit" type="submit" value="Absenden">
        </form>
        <?php require  __DIR__ . "/../../templates/footer.php"?>
    </body>

</html>