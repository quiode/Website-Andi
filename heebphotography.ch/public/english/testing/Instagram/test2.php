<!DOCTYPE html>
<html>

    <head></head>

    <body>
        <?php
        $dom = new DOMDocument;
        $dom->loadHTML('https://www.instagram.com/heebphotography/');
        $dom->saveHTMLFile("testlol.html");
        ?>
    </body>

</html>