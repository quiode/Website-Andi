<p>
    This is just for texting
    <?php
    $myfile = fopen("testfile.txt", "a+");
    $txt = "John Doe\n";
    fwrite($myfile, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    ?>
</p>