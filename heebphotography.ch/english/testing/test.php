<html>

<head>
    <title>My First PHP Page</title>
</head>

<body>
    <?php
    echo "Hello World!";
    echo nl2br("\r\n");
    $Name = "Dominik Schwaiger";
    $Age = 16;
    $Mood = "Tired";
    echo nl2br($Name . "\r\n");
    echo nl2br($Mood . "\r\n");
    echo nl2br($Age . "\r\n");
    define("Constant", "This constant is very nice");
    echo nl2br(Constant . "\r\n");
    echo nl2br("\r\n\r\n");
    $Cool = "Super";
    $Super = "Mega";
    $Mega = $Name;
    echo $Cool;
    echo nl2br(" ");
    echo $$Cool;
    echo nl2br(" ");
    echo "Cool " . "= ";
    echo nl2br(" ");
    echo $$$Cool;
    _
    ?>
    <!-- <script language="php">
    echo "Hello World!";
    </script> -->
</body>

</html>