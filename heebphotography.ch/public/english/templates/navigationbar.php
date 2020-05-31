<nav>
    <?php
    echo "<script src=\"" . "https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.js" . "\"></script>"
    ?>
    <div id="navigation_button" onclick="navigation_button(this)">
        <div id="bar1"></div>
        <div id="bar2"></div>
        <div id="bar3"></div>
    </div>
    <ul>
        <?php
        echo "<li><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "gallery/" . "\">Gallery</a></li>";
        echo "<li><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "about me/" . "\">About me</a></li>";
        echo "<li><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "linktree/" . "\">Linktree</a></li>";
        echo "<li><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "contact/" . "\">Contact</a></li>";
        echo "<li><a href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "impressum/" . "\">Impressum</a></li>";
        ?>
    </ul>
</nav>