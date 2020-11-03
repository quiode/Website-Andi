<?php
session_start();
if (sizeof($_SESSION["everything"]) == sizeof($_POST)) { // if everything was selected, change nothing
    $_SESSION["all"] = true;
} else { //adds all selected elements to the blacklist array
    $_SESSION["all"] = false; //not everything is selected
    $_SESSION["blacklist"] = array(); //removes everything from the blacklist
    foreach ($_SESSION["everything"] as $filter_option) { //checks for every item that can be filtered, if its selected to be filtered
        if (!in_array($filter_option, $_POST)) {
            array_push($_SESSION["blacklist"], $filter_option);
        }
    }
}
echo '<script> window.open("https://en.heebphotography.ch/gallery/", "_self");</script>';
