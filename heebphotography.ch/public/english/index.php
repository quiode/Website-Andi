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

        <?php require '../english/templates/navigationbar.php'?>
        <?php require "../english/templates/work_in_progress.php"?>

        <section>
            <?php
            $dir = "images-home";
            if (is_dir($dir)) {
                $scan = scandir($dir);
                
                $is_first_tester = true;
                foreach ($scan as $value) {
                    if ($is_first_tester) {
                        if (!(is_dir($value))) {
                            echo "<div class=\"slides\" id=\"first_slide\" style=\"background: linear-gradient(to top, transparent 70%, transparent 70%, white),left bottom/100vw no-repeat url($dir/$value);\"></div>";
                            $is_first_tester = false;
                        }
                    } else {
                        if (!(is_dir($value))) {
                            echo "<div class=\"slides\" style=\"background: linear-gradient(to top, transparent 70%, transparent 70%, white), left bottom/100vw no-repeat url($dir/$value);\"></div>";
                        }
                    }
                }
            }
            ?>
        </section>

        <aside id="profile">
            <div id="profile_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tempor volutpat
                elit. Praesent pretium mauris nibh, sit amet rutrum mi lobortis non. Morbi eget ligula tristique nunc
                lobortis malesuada. Proin quis vestibulum arcu. Vestibulum at aliquet mi. Donec efficitur euismod ligula
                sit amet lacinia. Cras ac sem quam. Maecenas maximus blandit accumsan. Ut sit amet luctus est. Maecenas
                cursus pellentesque purus, ut egestas justo pulvinar congue. Cras vulputate semper fringilla. Duis lacus
                arcu, convallis viverra rhoncus vel, egestas eu dolor. Ut tempus enim eu purus dictum ullamcorper.
                Aenean malesuada, velit in consequat porttitor, lacus diam facilisis velit, nec faucibus elit risus eu
                libero. Duis faucibus leo non pellentesque interdum. Vivamus a nulla orci. </div>
            <img id="profile_picture" src="./profile_picture.jpg"></img>
        </aside>
    </body>

</html>