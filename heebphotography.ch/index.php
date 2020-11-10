<!DOCTYPE html>
<html>

    <head>
        <title>Tierfotografie Andreas Heeb</title>
        <link rel="stylesheet" href="./public/styles/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- font -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon"
            href="https://heebphotography.ch/public/images/favicon/favicon.ico" />
    </head>

    <body id="language">
        <ul>
            <li>
                <?php
            echo "<a href=\"https://en.";
            echo $_SERVER['HTTP_HOST'];
            echo "\" id =\"english\">English</a>"
            ?>
                <div id="background_english"></div>
            </li>
            <li>
                <?php
            echo  "<a href=\"https://de.";
            echo $_SERVER['HTTP_HOST'];
            echo "\" id =\"deutsch\">Deutsch</a>"
            ?>
                <div id="background_deutsch"></div>
            </li>
        </ul>
    </body>

</html>