<nav>
    <?php
    echo "<script src=\"" . "https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.js" . "\"></script>"
    ?>
    <div class="navigation_button" onclick="navigation_button(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <ul>
        <?php
        echo "<li><a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "gallery/" . "\">Gallery</a></li>";
        echo "<li><a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "about me/" . "\">About me</a></li>";
        echo "<li><a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "linktree/" . "\">Linktree</a></li>";
        echo "<li><a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "contact/" . "\">Contact</a></li>";
        echo "<li><a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "impressum/" . "\">Impressum</a></li>";
        ?>
    </ul>
</nav>