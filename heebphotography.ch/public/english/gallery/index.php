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
        <?php require __DIR__ . "/../templates/navigationbar.php"?>
        <!-- wip bar -->
        <?php require __DIR__ . "/../templates/work_in_progress.php"?>

        <div>
            <?php
            // connect to the database
            $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
            // gets the names of the images from the databse
            $query = "SELECT name, category, type FROM images";
            $query_result = pg_query($query);
            $result = pg_fetch_all($query_result);
            $all_rows = array();
            foreach ($result as $name) {
                array_push($all_rows, $name);
            }
            // splits the images in 4 seperate arrays with +- 1 the same amount of images
            $image_column_1 = array();
            $image_column_2 = array();
            $image_column_3 = array();
            $image_column_4 = array();
            $i = 0;
            $c = 0;
            while ($i <= sizeof($all_rows)) {
                $image_column_1[$c] = $all_rows[$i++];
                if ($i >= sizeof($all_rows)) {
                    break;
                }
                $image_column_2[$c] = $all_rows[$i++];
                if ($i >= sizeof($all_rows)) {
                    break;
                }
                $image_column_3[$c] = $all_rows[$i++];
                if ($i >= sizeof($all_rows)) {
                    break;
                }
                $image_column_4[$c++] = $all_rows[$i++];
                if ($i >= sizeof($all_rows)) {
                    break;
                }
            }
            ?>

            <!-- makes 4 rows of images -->
            <div id="all_rows">
                <div>
                    <?php
                    foreach ($image_column_1 as $image) {
                        echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                        echo $image["name"];
                        echo ".jpg\" class=\"image";
                        echo " ";
                        echo $image["category"];
                        echo " ";
                        echo $image["type"];
                        echo "\" onclick=\"slideshow_on(this.src)\">";
                    }
                    ?>
                </div>

                <div>
                    <?php
                    foreach ($image_column_2 as $image) {
                        echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                        echo $image["name"];
                        echo ".jpg\" class=\"image";
                        echo " ";
                        echo $image["category"];
                        echo " ";
                        echo $image["type"];
                        echo "\" onclick=\"slideshow_on(this.src)\">";
                    }
                    ?>
                </div>

                <div>
                    <?php
                    foreach ($image_column_3 as $image) {
                        echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                        echo $image["name"];
                        echo ".jpg\" class=\"image";
                        echo " ";
                        echo $image["category"];
                        echo " ";
                        echo $image["type"];
                        echo "\" onclick=\"slideshow_on(this.src)\">";
                    }
                    ?>
                </div>

                <div>
                    <?php
                    foreach ($image_column_4 as $image) {
                        echo "<img src=\"https://heebphotography.ch/public/images/gallery/thumbnail/";
                        echo $image["name"];
                        echo ".jpg\" class=\"image";
                        echo " ";
                        echo $image["category"];
                        echo " ";
                        echo $image["type"];
                        echo "\" onclick=\"slideshow_on(this.src)\">";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- the slideshow that pops up when clicking on an image -->
        <div id="slideshow_background">
            <div id="slideshow" onkeydown="key_pressed(event)">
                <img id="slideshow_image" src="https://heebphotography.ch/public/images/gallery/image_0.jpg"
                    onload="resizeToMax()">

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
        <?php require  __DIR__ . "/../templates/footer.php"?>
        <?php pg_close($dbconn); //ends connection to database?>
    </body>
</html>
