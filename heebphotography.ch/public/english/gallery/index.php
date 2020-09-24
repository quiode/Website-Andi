<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script src="gallery.js"></script>
        <title>Gallery | Wildlifephotography Andreas Heeb</title>
    </head>

    <body id="gallery">

        <!-- navigation element -->
        <?php require '../templates/navigationbar.php'?>
        <!-- wip bar -->
        <?php require "../templates/work_in_progress.php"?>

        <div>
            <?php
        // variables
            $path_images = "./images/testing/";
            $path_thumbnail_images = "./images/testing/thumbnail/";
        // searches the filename of all images in the images folder
            $images = scandir($path_images, 1);
            $thumbnail_images = scandir($path_thumbnail_images, 1);
        // deletes the last two elements of the filename list --> are always . and .. so not usefull
            unset($images[sizeof($images)-1]);
            unset($images[sizeof($images)-1]);

            unset($thumbnail_images[sizeof($thumbnail_images)-1]);
            unset($thumbnail_images[sizeof($thumbnail_images)-1]);
        // deletes the thumbnail dir
            unset($images[0]);
        // splits the images in 4 seperate arrays with +- 1 the same amount of images
            $image_column_1 = array();
            $image_column_2 = array();
            $image_column_3 = array();
            $image_column_4 = array();
            $i = 0;
            $c = 0;
            while ($i <= sizeof($thumbnail_images)) {
                $image_column_1[$c] = $thumbnail_images[$i++];
                if ($i >= sizeof($thumbnail_images)) {
                    break;
                }
                $image_column_2[$c] = $thumbnail_images[$i++];
                if ($i >= sizeof($thumbnail_images)) {
                    break;
                }
                $image_column_3[$c] = $thumbnail_images[$i++];
                if ($i >= sizeof($thumbnail_images)) {
                    break;
                }
                $image_column_4[$c++] = $thumbnail_images[$i++];
                if ($i >= sizeof($thumbnail_images)) {
                    break;
                }
            }
            ?>

            <!-- makes 4 rows of images -->
            <div id="all_rows">
                <div>
                    <?php
                    foreach ($image_column_1 as $image) {
                        echo "<img src=\"images/testing/thumbnail/";
                        echo $image;
                        echo "\" class=\"image\" onclick=\"slideshow_on(this.src)\">";
                    }
                    ?>
                </div>

                <div>
                    <?php
                    foreach ($image_column_2 as $image) {
                        echo "<img src=\"images/testing/thumbnail/";
                        echo $image;
                        echo "\" class=\"image\" onclick=\"slideshow_on(this.src)\">";
                    }
                    ?>
                </div>

                <div>
                    <?php
                    foreach ($image_column_3 as $image) {
                        echo "<img src=\"images/testing/thumbnail/";
                        echo $image;
                        echo "\" class=\"image\" onclick=\"slideshow_on(this.src)\">";
                    }
                    ?>
                </div>

                <div>
                    <?php
                    foreach ($image_column_4 as $image) {
                        echo "<img src=\"images/testing/thumbnail/";
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
                <img id="slideshow_image" src="./images/testing/image_0.jpg" onload="resizeToMax()">

                <!-- for navigation within the slideshow -->
                <div class="arrows_background">
                    <div onclick="last_picture()" style="z-index: 7; position: fixed;">
                        <?php require '../templates/arrow_btn_left.php'?>
                    </div>
                </div>

                <div class="arrows_background" style="right:0;">
                    <div onclick="next_picture()" style="z-index: 7; position: fixed;">
                        <?php require '../templates/arrow_btn_right.php'?>
                    </div>
                </div>

                <div onclick="slideshow_off()">
                    <!-- adds close button -->
                    <?php require '../templates/close_btn.php'?>
                </div>
            </div>
        </div>
    </body>

</html>