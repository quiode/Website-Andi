<?php
session_start();
if (sizeof($_SESSION["everything"]) == sizeof($_POST)) { // if everything was selected, change nothing
    $_SESSION["all"] = true;
    echo "<script>window.close();</script>";
} else {
    foreach ($_SESSION["everything"] as $filter_option => $value) {
        echo $value;
    }
}
// testing
var_dump($_SESSION);
echo "<br>";
var_dump($_POST);
