<!DOCTYPE html>
<html>

    <head></head>

    <body>
        <?php
        // $heebphotography_posts = json_decode("https://www.instagram.com/heebphotography/?__a=1");
        // print_r($heebphotography_posts);
        // $regex = "/\"shortcode\":\".*\"/";
        $file_contents = file_get_contents("https://www.instagram.com/heebphotography/?__a=1");
        // echo "<h1>" . $file_contents . "</h1>";
        // echo substr($file_contents, strpos($file_contents, "shortcode") + 12, 11);
        phpinfo();
        // while (substr_count($file_contents, "shortcode") > 0) {
        //     echo substr($file_contents, strpos($file_contents, "shortcode") + 12, 11);
        //     $file_contents = substr_replace($file_contents, "", strpos($file_contents, "shortcode") + 12, 11);
        // }
        ?>
    </body>

</html>
