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
            <div class="slide fade">
                <img src="images-home/img1.jpg">
            </div>
            <div class="slide fade">
                <img src="images-home/img2.jpg">
            </div>
            <div class="slide fade">
                <img src="images-home/img3.jpg">
            </div>
            <div class="slide fade">
                <img src="images-home/img4.jpg">
            </div>
            <div class="slide fade">
                <img src="images-home/img5.jpg">
            </div>
        </div>
    </section>

    <aside>

    </aside>

    <footer>
        <p>&copy; Andreas Heeb 2020</p>
    </footer>
</body>

</html>