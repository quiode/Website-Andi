<html>
  <head>
    <title>My First PHP Page</title>
  </head>
  <body>
  <?php   
    echo "Hello World!
    ";
    $Name = "Dominik Schwaiger";
    $Age = 16;
    $Mood = "Tired";
    echo $Name;
    echo "
    ";
    echo $Mood;
    echo "
    ";
    echo $Age;
    define("Constant", "This constant is very nice");
    echo "
    ";
    echo Constant;
  ?>  
  <!-- <script language="php">
  echo "Hello World!";
</script> -->
  </body>
</html>