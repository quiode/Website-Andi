<!DOCTYPE html>
<html>

<head>
    <title>Wildlifephotography Andreas Heeb</title>
    <link rel="stylesheet" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <ul>
        <!-- <li>
            <a href="../public/english" id="english">English</a>
        </li> -->
        <!-- <li>
            <a href="../public/deutsch" id="deutsch">Deutsch</a>
        </li> -->
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