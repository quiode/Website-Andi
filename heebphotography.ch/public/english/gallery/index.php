<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | Wildlifephotography Andreas Heeb</title>
</head>

<body>
    <?php
    $images = scandir("heebphotography.ch/public/english/images", 1);
    echo $images;
    ?>
</body>

</html>