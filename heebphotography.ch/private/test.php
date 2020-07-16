<p>
    This is just for texting
    <?php
    $myfile = fopen("testfile.txt", "a+");
    fwrite($myfile, $_POST["message"]);
    fclose($myfile);
    ?>
</p>
