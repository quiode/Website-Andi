<?php
session_start();
$all_first_clicked = $_COOKIE["all_first_clicked"];
if (in_array("all", $_POST) and $all_first_clicked == "true") { // if the filter button was selected and clicked, display everything
    $_SESSION["all"] = true;
} elseif (!in_array("all", $_POST) and $all_first_clicked == "true") { // if the filter button not selected but clicked, display nothing
    $_SESSION["all"] = false;
    foreach ($_SESSION["everything"] as $item) {
        array_push($_SESSION["blacklist"], $item);
    }
} elseif (sizeof($_SESSION["everything"]) == sizeof($_POST) and !in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked and also not selected, but everything else is selected, display everything
    $_SESSION["all"] = true;
} elseif (sizeof($_SESSION["everything"]) == sizeof($_POST)-1 and in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked but selected and everything else is selected, display everything
    $_SESSION["all"] = true;
} elseif (sizeof($_SESSION["everything"]) > sizeof($_POST) and !in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked and not selected, but also not everything else was selected, display only that which was selected
    $_SESSION["all"] = false; //not everything is selected
    $_SESSION["blacklist"] = array(); //removes everything from the blacklist
    foreach ($_SESSION["everything"] as $filter_option) { //checks for every item that can be filtered, if its selected to be filtered
        if (!in_array($filter_option, $_POST)) {
            array_push($_SESSION["blacklist"], $filter_option);
        }
    }
} elseif (sizeof($_SESSION["everything"]) > sizeof($_POST)-1 and in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked but selected and also not everything else was selected, display only that which was selected
    $_SESSION["all"] = false; //not everything is selected
    $_SESSION["blacklist"] = array(); //removes everything from the blacklist
    foreach ($_SESSION["everything"] as $filter_option) { //checks for every item that can be filtered, if its selected to be filtered
        if (!in_array($filter_option, $_POST)) {
            array_push($_SESSION["blacklist"], $filter_option);
        }
    }
}
echo '<script> window.open("https://en.heebphotography.ch/gallery/", "_self");</script>';
