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
        <div class="container_slideshow">
        <?php
            $dir = "images-home";
            if (is_dir($dir)) {
                $scan = scandir($dir);
                
                $is_first_tester = true;
                foreach ($scan as $value) {
                    if ($is_first_tester) {
                        if (!(is_dir($value))) {
                            echo "<div class=\"image-crop\"><img class=\"slides\" id=\"first_slide\" src=\"$dir/$value\" alt=\"$value\">\n</div>\n";
                            $is_first_tester = false;
                        }
                    } else {
                        if (!(is_dir($value))) {
                            echo "<div class=\"image-crop\"><img class=\"slides\" src=\"$dir/$value\" alt=\"$value\">\n</div>\n";
                        }
                    }
                }
            }
        ?>
        </div>  
    </section>

    <aside>

    </aside>

    <footer>
        <p>&copy; Andreas Heeb 2020</p>
    </footer>
</body>

</html>
