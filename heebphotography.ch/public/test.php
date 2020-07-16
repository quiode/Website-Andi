<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test</title>
    </head>

    <body>
        This is just for testting
        <form action="/heebphotography.ch/private/test.php" method="POST">
            <input type="text" id="message" name="message" maxlength="1000" autocomplete="off" title="Message">
            <input type="submit" value="Submit">
        </form>
        <?php
        require "/heebphotography.ch/private/test.php";
        ?>
    </body>

</html>