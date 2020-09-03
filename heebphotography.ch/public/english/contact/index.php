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
    <!-- <?php require "../templates/work_in_progress.php"?> -->
    <!-- the contact form, you can leave a lot empty and just send it anonymous -->
    <form action="./contact_backend.php" method="POST" onsubmit="form_submit()">
        <!-- selection for how to contact the person -->
        <label for="how_to_contact">Please choose a way we can contact you:</label>
        <select name="how_to_contact" id="how_to_contact" onchange="contact_changed(this)">
            <!-- <option value="none" selected disabled hidden>
                    Please select an option
                </option> -->
            <option value="email">Email</option>
            <option value="phone">Phone</option>
            <option value="instagram">Instagram</option>
            <option value="anonymous" selected>Anonymous</option>
        </select>
        </br>
        <!-- depends on what is chose in the above -->
        <!-- email -->
        <label for="email" class="email">Email:</label>
        <input type="email" id="email" class="email" name="email" placeholder="example@example.com" maxlength="256"
            title="example@example.com">
        <br class="email">
        <!-- phone -->
        <label for="phone" class="phone">Phone:</label>
        <input type="tel" id="phone" class="phone" name="phone" placeholder="012 345 67 89" maxlength="256"
            title="012 345 67 89">
        <br class="phone">
        <!-- instagram -->
        <label for="instagram" class="instagram">Instagram:</label>
        <input type="text" id="instagram" class="instagram" name="instagram" placeholder="@username" pattern="@.*"
            title="@username" maxlength="256">
        <br class="instagram">
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
        <label for="message">Message:</label>
        <br id="msg_br" style="display:none;">
        <textarea rows="1" cols="30" oninput="message_changed()" type="text" id="message" name="message" maxlength="1000" autocomplete="off" title="Message" required></textarea>
        </br>
        <!-- submit button -->
        <input id="submit" type="submit" value="Submit">
    </form>
</body>

</html>
