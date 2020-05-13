<html>

<head>
    <title>My First PHP Page</title>
</head>

<body>
    <h1>
        <?php
        echo "Hello World!";
        echo "\r\n";
        $Name = "Dominik Schwaiger";
        $Age = 16;
        $Mood = "Tired";
        echo $Name . "";
        echo $Mood . "\r\n";
        echo $Age . "\r\n";
        define("Constant", "This constant is very nice");
        echo Constant . "\r\n";
        echo "\r\n\r\n";
        echo $Name;
        echo "\r\n";
        echo $$Name;
        echo "\r\n";
        echo $$$Name;
        ?>
    </h1>
    <!-- <script language="php">
    echo "Hello World!";
    </script> -->
</body>

</html>