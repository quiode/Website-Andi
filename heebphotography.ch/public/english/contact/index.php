<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Wildlifephotography Andreas Heeb</title>
    <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
    <script src="contact.js"></script>
</head>

<body id="contact_form">
    <header></header>
    <!-- the navigation bar -->
    <?php require '../templates/navigationbar.php'?>
    <!-- wip bar -->
    <?php require "../templates/work_in_progress.php"?>
    <!-- the contact form, you can leave a lot empty and just send it anonymous -->
    <form action="./contact_backend.php" method="POST" onsubmit="form_submit()">
        <!-- email -->
        <label for="email" class="email">Email:</label>
        <input type="email" id="email" class="email" name="email" placeholder="example@example.com" maxlength="256"
            title="example@example.com">
        <br class="email">
        <!-- first name -->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" maxlength="256" autocomplete="on" placeholder="Anonymous"
            title="FirstName">
        <!-- last name -->
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" maxlength="256" autocomplete="on" placeholder="Anonymous"
            title="LastName">
        <!-- Subject -->
        </br>
        <label for="subject">Subject:</label>
        <select name="subject" id="subject" onchange="subject_changed()">
            <option value="bug">Bug</option>
            <option value="copyright_question">Copyright Question</option>
            <option value="photography_question">Question about Photography</option>
            <option value="animal_question">Question about Animals</option>
            <option value="business_question">Business Question</option>
            <option value="bored">I'm bored and just wanna talk</option>
            <option value="custom">Something else</option>
        </select>
        <!-- custom subject -->
        <br class="custom_subject">
        <label for="custom_subject" class="custom_subject">Please Elaborate:</label>
        <input type="text" id="custom_subject" class="custom_subject" name="custom_subject" maxlength="256"
            autocomplete="off" title="Subject" autofocus>
        <!-- the actual message -->
        </br>
        <label for="message" class="message">Message:</label>
        <br id="msg_br" style="display:none;">
        <textarea rows="1" cols="30" oninput="message_changed()" type="text" id="message" name="message" class="message" maxlength="1000" autocomplete="off" title="Message" required></textarea>
        </br>
        <!-- submit button -->
        <input id="submit" type="submit" value="Submit">
    </form>
</body>

</html>
