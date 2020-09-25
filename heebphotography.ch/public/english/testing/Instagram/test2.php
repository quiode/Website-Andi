<!DOCTYPE html>
<html>

    <head></head>

    <body>
        <?php
        echo "test";
        $dom = new DOMDocument;
        $dom->loadHTML('https://www.instagram.com/heebphotography/');
        $dom->saveHTMLFile("testlol.html");
        ?>
    </body>

</html>
