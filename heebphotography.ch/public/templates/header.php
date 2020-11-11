<header id="header">
    <?php echo '<a id="desktop_header" href="https://' . $_SERVER['HTTP_HOST'] . '">Heeb Photography</a>'; ?>
    <nav id="navigationbar">
        <?php
        // includes the javascript file
        echo "<script src=\"https://heebphotography.ch/public/templates/navigationbar.js\"></script>"
        ?>
        <!-- makes the button for navigation -->
        <div id="navigation_button" onclick="navigation_button(this)">
            <div class="bar1" id="b1"></div>
            <div class="bar2" id="b2"></div>
            <div class="bar3" id="b3"></div>
        </div>
        <!-- linkstree to the other pages -->
        <div id="navigation-overlay">
            <div id="navigation-content">
                <?php
                if (strpos($_SERVER['HTTP_HOST'], "en") !== false) {
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "" . "\">Home</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "gallery/" . "\">Gallery</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "about me/" . "\">About me</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "linktree/" . "\">Linktree</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "contact/" . "\">Contact</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "impressum/" . "\">Impressum</a>";
                } else {
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "" . "\">Startseite</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "gallery/" . "\">Bildergalerie</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "about me/" . "\">Über Mich</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "linktree/" . "\">Soziale Medien</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "contact/" . "\">Kontakt</a>";
                    echo "<a class=\"links\" href=\"" ."https://" . $_SERVER['HTTP_HOST'] . "/" . "impressum/" . "\">Impressum</a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <?php echo '<a id="mobile_headers_heeb" href="https://' . $_SERVER['HTTP_HOST'] . '">Andreas Heeb</a>'; ?>
    <?php echo '<a id="mobile_header_photography" href="https://' . $_SERVER['HTTP_HOST'] . '">Photography</a>' ?>
</header>
