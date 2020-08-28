<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wildlifephotography Andreas Heeb</title>
    <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
    <!-- <?php
    echo "<link rel=\"stylesheet\" href=\"https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.css" . "\">";
    ?> -->
    <script src="script.js"></script>
</head>

<body id="english" onload="slideshow()">
    <header>
        <h2>Heeb Photography</h2>
    </header>
    <?php require '../english/templates/navigationbar.php'?>
    <section>
        <div class="container_slideshow">
            <?php
            $dir = "images-home";
            if (is_dir($dir)) {
                $scan = scandir($dir);
                
                foreach ($scan as $value) {
                    if (!(is_dir($value))) { 
                        echo "<div class=\"slide\">\n
                        <img src=\"$dir/$value\" alt=\"$value\">\n
                        </div>";
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