<html>

<head>
    <title>Language | Wildlifephotography Andreas Heeb</title>
    <link rel="stylesheet" href="stylesheet.css">
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
            echo "<a href=\"en.";
            echo $_SERVER['HTTP_HOST'];
            echo "\" id =\"english\">English</a>>"
            ?>
        </li>
        <li>
            <?php
            echo "<a href=\"de.";
            echo $_SERVER['HTTP_HOST'];
            echo "\" id =\"deutsch\">Deutsch</a>>"
            ?>
        </li>
    </ul>
</body>

</html>