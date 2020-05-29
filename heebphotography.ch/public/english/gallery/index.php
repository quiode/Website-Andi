<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Gallery | Wildlifephotography Andreas Heeb</title>
</head>

<body>
    <nav>
    </nav>
    <div id="gallery">
        <?php
    $images = scandir("images", 1);
    unset($images[sizeof($images)-1]);
    unset($images[sizeof($images)-1]);
    foreach ($images as $image){
        echo "<img src=\"images/";
        echo $image;
        echo "\" class=\"image\">";}
    ?>
    </div>
</body>

</html>