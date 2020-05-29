<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | Wildlifephotography Andreas Heeb</title>
</head>

<body>
    <?php
    $images = scandir("/images", 1);
    echo $images;
    ?>
    <img src="/images/2.jpg" />
    OK WTF WARUM GAHT DAS NÖD
</body>

</html>