<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <?php
    echo "<link rel=\"stylesheet\" href=\"https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.css" . "\">";
    ?>

    <!-- for material design icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="script.js"></script>
    <title>Gallery | Wildlifephotography Andreas Heeb</title>
</head>

<body>

    <!-- navigation element -->
    <?php require '../templates/navigationbar.php'?>

    <div id="gallery">
        <?php
        // searches the filename of all images in the images folder
        $images = scandir("images", 1);
        // deletes the last two elements of the filename list --> are always . and .. so not usefull
        unset($images[sizeof($images)-1]);
        unset($images[sizeof($images)-1]);
        // splits the images in 4 seperate arrays with +- 1 the same amount of images
        $image_column_1 = array();
        $image_column_2 = array();
        $image_column_3 = array();
        $image_column_4 = array();
        $i = 0;
        $c = 0;
        while ($i <= sizeof($images)) {
            $image_column_1[$c] = $images[$i++];
            if ($i >= sizeof($images)) {
                break;
            }
            $image_column_2[$c] = $images[$i++];
            if ($i >= sizeof($images)) {
                break;
            }
            $image_column_3[$c] = $images[$i++];
            if ($i >= sizeof($images)) {
                break;
            }
            $image_column_4[$c++] = $images[$i++];
        }
        ?>

        <!-- makes 4 rows of images -->
        <div class="row">
            <div class="column">
                <?php
                foreach ($image_column_1 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\" onclick=\"slideshow_on(this.src)\">";
                }
                ?>
            </div>

            <div class="column">
                <?php
                foreach ($image_column_2 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\" onclick=\"slideshow_on(this.src)\">";
                }
                ?>
            </div>

            <div class="column">
                <?php
                foreach ($image_column_3 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\" onclick=\"slideshow_on(this.src)\">";
                }
                ?>
            </div>

            <div class="column">
                <?php
                foreach ($image_column_4 as $image) {
                        echo "<img src=\"images/";
                        echo $image;
                        echo "\" class=\"image\" onclick=\"slideshow_on(this.src)\">";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- the slideshow that pops up when clicking on an image -->
    <div id="slideshow_background">
        <div id="slideshow" onkeydown="key_pressed(event)">
            <img id="slideshow_image" src="./images/101030189_1928756140588065_3843172269444384879_n.jpg"
                onload="resizeToMax()">

            <!-- for navigation within the slideshow -->
            <div id="last_picture_background" class="arrows_background">
                <div id="last_picture" class="arrows" onclick="last_picture()">
                    &#8249;
                </div>
            </div>

            <div id="next_picture_background" class="arrows_background">
                <div id="next_picture" class="arrows" onclick="next_picture()">
                    &#8250;
                </div>
            </div>

            <div id="close_btn" onclick="slideshow_off()">
                <div id="plus">
                    <div id="pline_1"></div>
                    <div id="pline_2"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
