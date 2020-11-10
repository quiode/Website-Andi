<?php
session_start();
// debug
// var_dump($_COOKIE);
// echo '<br>';
// var_dump($_SESSION);
// echo '<br>';
// var_dump($_POST);
// echo '<br>';
//debug
$searchbar_first_clicked = $_COOKIE["searchbar_first_clicked"];
$all_first_clicked = $_COOKIE["all_first_clicked"];
setcookie("all_first_clicked", "false", time() + 5000 * 60 * 60, "/", ['samesite' => 'Lax']); // sets the cookie to false to avoid confusion
setcookie("searchbar_first_clicked", "false", time() + 5000 * 60 * 60, "/", ['samesite' => 'Lax']); // sets the cookie to false to avoid confusion
$_SESSION["searchbar_input"] = ""; // clears the searchbar_input value to eliminate bugs/confusion
if ($searchbar_first_clicked == "true") { // if something was searched, evaluate it
    $_SESSION["all"] = false; // not everything is selected
    if (in_array(strtolower($_POST["searchbar"]), array_map('strtolower', $_SESSION["everything"]))) { // if the user has selected a category, only disable all other categories
        $_SESSION["blacklist"] = array(); //removes everything from the blacklist
        foreach ($_SESSION["everything"] as $item) {
            if (strtolower($item) != strtolower($_POST["searchbar"])) {
                array_push($_SESSION["blacklist"], $item);
            }
        }
    } else { // if the user has selected something else, send it back to the "front end"
        $_SESSION["searchbar_input"] = $_POST["searchbar"];
    }
} else { // if nothing was searched, do the normal thing
    if (in_array("all", $_POST) and $all_first_clicked == "true") { // if the filter button was selected and clicked, display everything
        $_SESSION["all"] = true;
        // debug
        // echo '1';
        // echo '<br>';
        // debug
    } elseif (!in_array("all", $_POST) and $all_first_clicked == "true") { // if the filter button not selected but clicked, display nothing
        $_SESSION["all"] = false;
        foreach ($_SESSION["everything"] as $item) {
            array_push($_SESSION["blacklist"], $item);
        }
        // debug
        // echo '2';
        // echo '<br>';
        // debug
    } elseif (sizeof($_SESSION["everything"]) == sizeof($_POST)-1 and !in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked and also not selected, but everything else is selected, display everything
        $_SESSION["all"] = true;
        // debug
        // echo '3';
        // echo '<br>';
        // debug
    } elseif (sizeof($_SESSION["everything"]) == sizeof($_POST)-2 and in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked but selected and everything else is selected, display everything
        $_SESSION["all"] = true;
        // debug
        // echo '4';
        // echo '<br>';
        // debug
    } elseif (sizeof($_SESSION["everything"]) > sizeof($_POST)-1 and !in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked and not selected, but also not everything else was selected, display only that which was selected
        $_SESSION["all"] = false; //not everything is selected
        $_SESSION["blacklist"] = array(); //removes everything from the blacklist
        foreach ($_SESSION["everything"] as $filter_option) { //checks for every item that can be filtered, if its selected to be filtered
            if (!in_array($filter_option, $_POST)) {
                array_push($_SESSION["blacklist"], $filter_option);
            }
        }
        // debug
        // echo '5';
        // echo '<br>';
        // debug
    } elseif (sizeof($_SESSION["everything"]) > sizeof($_POST)-2 and in_array("all", $_POST) and $all_first_clicked == "false") { // if the filter button was not clicked but selected and also not everything else was selected, display only that which was selected
        $_SESSION["all"] = false; //not everything is selected
        $_SESSION["blacklist"] = array(); //removes everything from the blacklist
        foreach ($_SESSION["everything"] as $filter_option) { //checks for every item that can be filtered, if its selected to be filtered
            if (!in_array($filter_option, $_POST)) {
                array_push($_SESSION["blacklist"], $filter_option);
            }
        }
        // debug
        // echo '6';
        // echo '<br>';
        // debug
    }
    // debug
    // var_dump($_SESSION);
    // debug
}
echo '<script> window.open("https://en.heebphotography.ch/gallery/", "_self");</script>';
