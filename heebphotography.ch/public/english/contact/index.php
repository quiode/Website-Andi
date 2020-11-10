<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact | Wildlifephotography Andreas Heeb</title>
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
                title="example@example.com">
            <!-- first name label -->
            <label for="first_name">First Name:</label>
            <!-- first name -->
            <input type="text" id="first_name" name="first_name" maxlength="256" autocomplete="on"
                placeholder="Anonymous" title="FirstName">
            <!-- last name label-->
            <label for="last_name">Last Name:</label>
            <!-- last name -->
            <input type="text" id="last_name" name="last_name" maxlength="256" autocomplete="on" placeholder="Anonymous"
                title="LastName">
            <!-- Subject -->
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
            <label for="custom_subject" class="custom_subject">Please Elaborate:</label>
            <input type="text" id="custom_subject" class="custom_subject" name="custom_subject" maxlength="256"
                autocomplete="off" title="Subject" autofocus>
            <!-- the actual message -->
            <label for="message" class="message">Message:</label>
            <textarea rows="5" cols="100" type="text" id="message" name="message" class="message" maxlength="1000"
                autocomplete="off" title="Message" required></textarea>
            <!-- submit button -->
            <input id="submit" type="submit" value="Submit">
        </form>
        <?php require  __DIR__ . "/../../templates/footer.php"?>
    </body>

</html>