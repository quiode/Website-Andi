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
    echo "<br>";
    $test = "test";
    ?>
    <!-- <script language="php">
    echo "Hello World!";
    </script> -->
    <h1>
    <?php
    echo "<br>";
    echo $test;
    echo "<br>";
    foreach ($_SERVER as $i) {
        echo $i . "<br>";
    }
    ?>
    </h1>
</body>

</html>