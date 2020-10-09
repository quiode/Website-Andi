<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wildlifephotography Andreas Heeb</title>
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script src="script.js"></script>
    </head>

    <body id="english" onload="slideshow(5000)">
        <header>
            <h2>Heeb Photography</h2>
        </header>

        <?php require  __DIR__ . '/../english/templates/navigationbar.php'?>
        <?php require __DIR__ . "/../english/templates/work_in_progress.php"?>

        <section>
            <?php
            // gets last 5 images from db
            $dbconn = pg_connect("host=heebphotography.ch port=5500 dbname=heebphotography user=postgres password=Y1qhk9nzfI2B");
            $query = "SELECT name FROM images ORDER BY upload_date DESC LIMIT 5";
            $query_result = pg_query($query);
            $all_rows = pg_fetch_all($query_result);
            pg_close($dbconn); //ends connection to database
            // displays the images
            var_dump($all_rows);
            // $dir = "images-home";
            // if (is_dir($dir)) {
            //     $scan = scandir($dir);
                
            //     $is_first_tester = true;
            //     foreach ($scan as $value) {
            //         if ($is_first_tester) {
            //             if (!(is_dir($value))) {
            //                 echo "<div class=\"slides\" id=\"first_slide\" style=\"background: linear-gradient(to top, transparent 70%, transparent 70%, white),left bottom/100vw no-repeat url($dir/$value);\"></div>";
            //                 $is_first_tester = false;
            //             }
            //         } else {
            //             if (!(is_dir($value))) {
            //                 echo "<div class=\"slides\" style=\"background: linear-gradient(to top, transparent 70%, transparent 70%, white), left bottom/100vw no-repeat url($dir/$value);\"></div>";
            //             }
            //         }
            //     }
            // }
            ?>
        </section>

        <aside id="profile">
            <img id="profile_picture" src="./profile_picture.jpg"></img>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor volutpat
            elit. Praesent pretium mauris nibh, sit amet rutrum mi lobortis non. Morbi eget ligula tristique nunc
            lobortis malesuada. Proin quis vestibulum arcu. Vestibulum at aliquet mi. Donec efficitur euismod ligula
            sit amet lacinia. Cras ac sem quam.
        </aside>

        <section id="instagram_feed">
            <?php
            $embedded_html = json_decode(file_get_contents("embeddedhtml.json", true));
            for ($i=0; $i < sizeof($embedded_html); $i++) {
                echo "<article class=\"instagram-posts\">";
                echo $embedded_html[$i];
                echo "</article>";
            }
            ?>
        </section>
        <?php require  __DIR__ . "/../english/templates/footer.php"?>
    </body>

</html>
