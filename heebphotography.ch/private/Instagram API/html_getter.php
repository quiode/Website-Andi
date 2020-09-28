<?php
// changes the include path if the file has been included in another script
if (basename(__FILE__) != basename($_SERVER["SCRIPT_FILENAME"])) {
    set_include_path("/var/www/Website-Andi/heebphotography.ch/private/Instagram API/");
}

require_once "token_updater.php";

// updates token
Token_updater();

function Ig_Business_Id_getter()
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
    $result = curl_exec($curl_session);

    //debugging
    var_dump(json_decode($result, true));

    if ($result != "false") {
        $result = json_decode($result, true);
    } else {
        if (curl_error($curl_session) != "") {
            return "Error: " . curl_error($curl_session);
        } else {
            return "Error!";
        }
    }
    curl_close($curl_session);
}

ig_business_id_getter();
