<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact | Wildlifephotography Andreas Heeb</title>
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <!-- <?php
        echo "<link rel=\"stylesheet\" href=\"https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.css" . "\">";
        ?> -->
    </head>

    <body>
        <header></header>
        <!-- the navigatio bar -->
        <?php include '../templates/navigationbar.php'?>
        <!-- the contact form, you can leave a lot empty and just send it anonymous -->
        <form action="./contact_backend.php" method="POST">
            <!-- selection for how to contact the person -->
            <label for="how_to_contact">Please choose a way we can contact you:</label>
            <select name="how_to_contact" id="how_to_contact">
                <!-- <option value="none" selected disabled hidden>
                    Please select an option
                </option> -->
                <option value="email">Email</option>
                <option value="phone">Phone</option>
                <option value="instagram">Instagram</option>
                <option value="anonymous" selected>Anonymous</option>
            </select>
            <!-- depends on what is chose in the above -->
            <!-- email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="example@example.com" maxlength="256"
                title="example@example.com" required>
            <!-- phone -->
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="012 345 67 89" maxlength="256" title="012 345 67 89" required>
            <!-- instagram -->
            <label for="instagram">Instagram:</label>
            <input type="text" id="instagram" name="instagram" placeholder="@username" pattern="@.*" title="@username"
                maxlength="256" required>
            <!-- first name -->
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" maxlength="256" autocomplete="on"
                placeholder="Anonymous" title="FirstName">
            <!-- last name -->
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" maxlength="256" autocomplete="on" placeholder="Anonymous"
                title="LastName">
            <!-- Subject -->
            <label for="subject">Subject:</label>
            <select name="subject" id="subject">
                <option value="bug">Bug</option>
                <option value="copyright_question">Copyright Question</option>
                <option value="photography_question">Question about Photography</option>
                <option value="animal_question">Question about Animals</option>
                <option value="business_question">Business Question</option>
                <option value="bored">I'm bored and just wanna talk</option>
                <option value="custom">Something else</option>
            </select>
            <!-- custom subject -->
            <label for="custom_subject">Please Elaborate:</label>
            <input type="text" id="custom_subject" name="custom_subject" maxlength="256" autocomplete="off"
                title="Subject" autofocus>
            <!-- the actual message -->
            <label for="message">Message:</label>
            <input type="text" id="message" name="message" maxlength="1000" autocomplete="off" title="Message" required>
            <!-- submit button -->
            <input type="submit" value="Submit">
        </form>
    </body>

</html>