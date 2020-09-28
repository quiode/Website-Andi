<?php
// changes the include path if the file has been included in another script
if (basename(__FILE__) != basename($_SERVER["SCRIPT_FILENAME"])) {
    set_include_path("/var/www/Website-Andi/heebphotography.ch/private/Instagram API/");
}

require_once "token_updater.php";

// updates token
Token_updater();

function Facebook_Page_Id_getter()
{
    // gets the Token Data
    $accessTokenData = file_get_contents("access_tokens.json", true);
    $accessTokenData = json_decode($accessTokenData, true);
    // deconstructs the Data
    $accessToken = $accessTokenData["access_token"];
    // getting user page information
    $url = "https://graph.facebook.com/v8.0/me/accounts?access_token=" . $accessToken;
    // start curl session and sets options
    $curl_session = curl_init();

    curl_setopt($curl_session, CURLOPT_URL, $url);
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
    // gets the result
    $result = curl_exec($curl_session);
    // checks if the result is correct and formats it
    if ($result != "false") {
        $result = json_decode($result, true);

        $page_id = $result["data"][0]["id"];
        curl_close($curl_session);
        return $page_id;
    } else { //returns an error, echos the error
        if (curl_error($curl_session) != "") {
            echo (curl_error($curl_session));
            curl_close($curl_session);
            return "error";
        } else {
            curl_close($curl_session);
            return "error";
        }
    }
}

function Ig_Id_getter($page_id)
{
    // gets the Token Data
    $accessTokenData = file_get_contents("access_tokens.json", true);
    $accessTokenData = json_decode($accessTokenData, true);
    // deconstructs the Data
    $accessToken = $accessTokenData["access_token"];
    // getting user page information
    $url =  "https://graph.facebook.com/v8.0/" . $page_id . "?fields=instagram_business_account&access_token=" . $accessToken;
    // start curl session and sets options
    $curl_session = curl_init();

    curl_setopt($curl_session, CURLOPT_URL, $url);
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
    // gets the result
    $result = curl_exec($curl_session);
    // checks if the result is correct and formats it
    if ($result != "false") {
        $result = json_decode($result, true);

        $ig_id = $result["instagram_business_account"]["id"];
        curl_close($curl_session);
        return $ig_id;
    } else { //returns an error, echos the error
        if (curl_error($curl_session) != "") {
            echo (curl_error($curl_session));
            curl_close($curl_session);
            return "error";
        } else {
            curl_close($curl_session);
            return "error";
        }
    }
}

function Ig_Media_getter($ig_id)
{
    // gets the Token Data
    $accessTokenData = file_get_contents("access_tokens.json", true);
    $accessTokenData = json_decode($accessTokenData, true);
    // deconstructs the Data
    $accessToken = $accessTokenData["access_token"];
    // getting user page information
    $url =  "https://graph.facebook.com/" . $ig_id . "/media?access_token=" . $accessToken;
    // start curl session and sets options
    $curl_session = curl_init();

    curl_setopt($curl_session, CURLOPT_URL, $url);
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
    // gets the result
    $result = curl_exec($curl_session);
    // checks if the result is correct and formats it
    if ($result != "false") {
        $result = json_decode($result, true);

        $media_ids = $result["data"];
        return $media_ids;
    } else { //returns an error, echos the error
        if (curl_error($curl_session) != "") {
            echo (curl_error($curl_session));
            curl_close($curl_session);
            return "error";
        } else {
            curl_close($curl_session);
            return "error";
        }
    }
}

//debugging/testing
var_dump(Ig_Media_getter(Ig_Id_getter((Facebook_Page_Id_getter()))));
