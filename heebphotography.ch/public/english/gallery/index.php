<?php
// start session for storing data
session_start();
if (!array_key_exists("all", $_SESSION)) { // if this is the first time the page as been loaded, make the variables, else dont
    $_SESSION["all"] = true; //at the start, all categories and types are selected in the filter
    $_SESSION["blacklist"] = array(); //blacklist for types and categories
}
$_SESSION["everything"] =  array(); //categories and types (clears it if the page had been reloaded)
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script src="gallery.js"></script>
        <title>Gallery | Wildlifephotography Andreas Heeb</title>
        <script>
        var d = new Date();
        d.setTime(d.getTime() + 5000 * 60 * 60);
        document.cookie = "all_first_clicked=false;expires=" + d.toUTCString() + ";path=/;samesite=lax";
        </script>
    </head>

    <body id="gallery">
        <!-- wip bar -->
        <?php require __DIR__ . "/../templates/work_in_progress.php"?>
        <?php require __DIR__ . "/../templates/header.php"?>

        <div id="filter_bar">
            <!-- filter form -->
            <form id="gallery_filter" action="./filter_backend.php" target="_self" method="post">
                <?php
                if ($_SESSION["all"]) { //only selects everything if the filter is "off"
                    // connect to the database
                    $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                    // gets all categories from the database which arent NULL
                    $query = "SELECT category FROM images WHERE category IS NOT NULL GROUP BY category";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    // button to select everything
                    echo '<input onChange="all_button(this)" type="checkbox" id="all" name="all" value="all" checked="checked" class="selected">';
                    echo '<label for="all" class="selected">Everything</label>';
                    // checkbox for each category
                    foreach ($all_rows as $row) {
                        echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '" checked="checked" class="selected">';
                        echo '<label for="category_' . $row["category"] . '" class="selected">' . $row["category"] . '</label>';
                        array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                    }
                    // selects all types and categories and makes a searchbar
                    echo '<input list="searchbar_elements" name="searchbar" id="searchbar" class="selected">';
                    echo '<datalist id="searchbar_elements">';
                    echo '</datalist>';
                } else {
                    // connect to the database
                    $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                    // gets all categories from the database which arent NULL
                    $query = "SELECT category FROM images WHERE category IS NOT NULL GROUP BY category";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    // button to select everything (not checked)
                    echo '<input onChange="all_button(this)" type="checkbox" id="all" name="all" value="all">';
                    echo '<label for="all">Everything</label>';
                    // checkbox for each row
                    foreach ($all_rows as $row) {
                        if (in_array($row["category"], $_SESSION["blacklist"])) { // unchecks the checkbox if it is in the blacklist
                            echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '">';
                            echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                            array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                        } else {
                            echo '<input onChange="this.form.submit()" type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '" checked="checked" class="selected">';
                            echo '<label for="category_' . $row["category"] . '" class="selected">' . $row["category"] . '</label>';
                            array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                        }
                    }
                    echo '<div id="searchbar"></div>';
                }
                ?>
                <input type="submit" value="Filter">
            </form>
        </div>

        <div>
            <?php
            if ($_SESSION["all"]) { //only selects everything if the filte is "off"
                // connect to the database
                $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                // gets the names of the images from the databse
                $query = "SELECT name, category, type FROM images ORDER BY upload_date DESC";
                $query_result = pg_query($query);
                $all_rows = pg_fetch_all($query_result);
                pg_close($dbconn); //ends connection to database
            } else { // only selects the ones which are not in the blacklist
                // connect to the database
                $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                $blacklist = "(''";
                foreach ($_SESSION["blacklist"] as $item) {
                    $blacklist .= ",'" . $item . "'";
                }
                $blacklist .= ")";
                $query = "SELECT name, category, type FROM images WHERE category NOT IN " . $blacklist . "AND type NOT IN " . $blacklist . " ORDER BY upload_date DESC";
                $query_result = pg_query($query);
                $all_rows = pg_fetch_all($query_result);
                pg_close($dbconn); //ends connection to database
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

                <div id="picture_description"></div>

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

        <div class="filter_btn" onclick="filter()">
            <img src="./icons/filter_alt-black-18dp.svg">
        </div>

        <!-- <div id="filter_menu"> -->
        <!-- filter form -->
        <!-- <form id="gallery_filter" action="./filter_backend.php" target="_self" method="post"> -->
        <?php /*
                if ($_SESSION["all"]) { //only selects everything if the filter is "off"
                    // connect to the database
                    $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                    // gets all categories from the database which arent NULL
                    $query = "SELECT category FROM images WHERE category IS NOT NULL GROUP BY category";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    foreach ($all_rows as $row) {
                        echo '<input type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '" checked="checked">';
                        echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                        array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                    }
                    // gets all types from the database which arent NULL
                    $query = "SELECT type FROM images WHERE type IS NOT NULL GROUP BY type";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    pg_close($dbconn); //ends connection to database
                    foreach ($all_rows as $row) {
                        echo '<input type="checkbox" id="type_' . $row["type"] . '" name="type_' . $row["type"] . '" value="' . $row["type"] . '" checked="checked">';
                        echo '<label for="type_' . $row["type"] . '">' . $row["type"] . '</label>';
                        array_push($_SESSION["everything"], $row["type"]); //adds the type to the session list of categories and types
                    }
                } else {
                    // connect to the database
                    $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
                    // gets all categories from the database which arent NULL
                    $query = "SELECT category FROM images WHERE category IS NOT NULL GROUP BY category";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    foreach ($all_rows as $row) {
                        if (in_array($row["category"], $_SESSION["blacklist"])) { // unchecks the checkbox if it is in the blacklist
                            echo '<input type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '">';
                            echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                            array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                        } else {
                            echo '<input type="checkbox" id="category_' . $row["category"] . '" name="category_' . $row["category"] . '" value="' . $row["category"] . '" checked="checked">';
                            echo '<label for="category_' . $row["category"] . '">' . $row["category"] . '</label>';
                            array_push($_SESSION["everything"], $row["category"]); //adds the category to the session list of categories and types
                        }
                    }
                    // gets all types from the database which arent NULL
                    $query = "SELECT type FROM images WHERE type IS NOT NULL GROUP BY type";
                    $query_result = pg_query($query);
                    $all_rows = pg_fetch_all($query_result);
                    pg_close($dbconn); //ends connection to database
                    foreach ($all_rows as $row) {
                        if (in_array($row["type"], $_SESSION["blacklist"])) { // unchecks the checkbox if it is in the blacklist
                            echo '<input type="checkbox" id="type_' . $row["type"] . '" name="type_' . $row["type"] . '" value="' . $row["type"] . '">';
                            echo '<label for="type_' . $row["type"] . '">' . $row["type"] . '</label>';
                            array_push($_SESSION["everything"], $row["type"]); //adds the type to the session list of categories and types
                        } else {
                            echo '<input type="checkbox" id="type_' . $row["type"] . '" name="type_' . $row["type"] . '" value="' . $row["type"] . '" checked="checked">';
                            echo '<label for="type_' . $row["type"] . '">' . $row["type"] . '</label>';
                            array_push($_SESSION["everything"], $row["type"]); //adds the type to the session list of categories and types
                        }
                    }
                } */
        ?>
        <!-- <input type="submit" value="Filter">
            </form>
        </div> -->

        <?php require  __DIR__ . "/../templates/footer.php"?>
    </body>

</html>
