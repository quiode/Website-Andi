<!-- only temporary -->

<head>
    <link rel="stylesheet" href="navigationbar.css">
</head>
<!-- only temporary -->

<nav>
    <?php
    echo "<script src=\"" . "https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.js" . "\"></script>"
    ?>
    <div class="navigation_button" onclick="navigation_button(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div id="navigation">
        <?php
        echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "gallery/" . "\">Gallery</a>";
        echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "about me/" . "\">About me</a>";
        echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "linktree/" . "\">Linktree</a>";
        echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "contact/" . "\">Contact</a>";
        echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "impressum/" . "\">Impressum</a>";
        ?>
    </div>
</nav>