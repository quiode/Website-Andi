<?php
// changes the include path if the file has been included in another script
if (basename(__FILE__) != basename($_SERVER["SCRIPT_FILENAME"])) {
    set_include_path("/var/www/Website-Andi/heebphotography.ch/private/Instagram API/");
}

require_once "token_updater.php";

// updates token
Token_updater();

function Facebook_Page_Id_getter($accessToken)
{
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

function Ig_Id_getter($page_id, $accessToken)
{
    // getting ig id
    $url = "https://graph.facebook.com/v8.0/" . $page_id . "?fields=instagram_business_account&access_token=" . $accessToken;
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

function Ig_Media_getter($ig_id, $accessToken)
{
    // getting media ids
    $url = "https://graph.facebook.com/v8.0/" . $ig_id . "/media?access_token=" . $accessToken;
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
        //returns only the id's in an array
        $temp_media_ids = array();
        for ($i=0; $i < sizeof($media_ids); $i++) {
            array_push($temp_media_ids, $media_ids[$i]["id"]);
        }
        $media_ids = $temp_media_ids;
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

function ShortCode_getter($media_ids, $accessToken)
{
    $shortcodes = array();
    for ($i=0; $i < sizeof($media_ids); $i++) {
        // getting shortcode information
        $url = "https://graph.facebook.com/v8.0/" . $media_ids[$i] . "?fields=shortcode&access_token=" . $accessToken;
        // start curl session and sets options
        $curl_session = curl_init();

        curl_setopt($curl_session, CURLOPT_URL, $url);
        curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
        // gets the result
        $result = curl_exec($curl_session);
        // checks if the result is correct and formats it
        if ($result != "false") {
            $result = json_decode($result, true);

            array_push($shortcodes, $result["shortcode"]);
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
    return $shortcodes;
}

function EmbeddedHtml_getter($shortcodes, $accessToken)
{
    $embeddedhtml = array();
    for ($i=0; $i < sizeof($shortcodes); $i++) {
        // getting embedded html
        $url = "https://graph.facebook.com/v8.0/instagram_oembed?url=https://www.instagram.com/p/" . $shortcodes[$i] . "/&access_token=" . $accessToken;
        // start curl session and sets options
        $curl_session = curl_init();

        curl_setopt($curl_session, CURLOPT_URL, $url);
        curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
        // gets the result
        $result = curl_exec($curl_session);
        // checks if the result is correct and formats it
        if ($result != "false") {
            $result = json_decode($result, true);

            array_push($embeddedhtml, $result["html"]);
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
    return $embeddedhtml;
}

// getting the accessToken
// gets the Token Data
$accessTokenData = file_get_contents("access_tokens.json", true);
$accessTokenData = json_decode($accessTokenData, true);
// deconstructs the Data
$accessToken = $accessTokenData["access_token"];

// saves it to a json file available for english/index.php
$embeddedhtml = EmbeddedHtml_getter(ShortCode_getter(Ig_Media_getter(Ig_Id_getter(Facebook_Page_Id_getter($accessToken), $accessToken), $accessToken), $accessToken), $accessToken);
$file_path = "/var/www/Website-Andi/heebphotography.ch/public/english/";
    
try { //makes a new file if it doesnt exist
    $json_file = fopen($file_path . "embeddedhtml.json", "x");
    fclose($json_file);
} catch (\Exception $th) {
}

file_put_contents($file_path . "embeddedhtml.json", json_encode($embeddedhtml));

// //debugging/testing
// function Just_Get_It_Done($accessToken)
// {
//     return EmbeddedHtml_getter(ShortCode_getter(Ig_Media_getter(Ig_Id_getter(Facebook_Page_Id_getter($accessToken), $accessToken), $accessToken), $accessToken), $accessToken);
// }

//     var_dump(Just_Get_It_Done($accessToken));
