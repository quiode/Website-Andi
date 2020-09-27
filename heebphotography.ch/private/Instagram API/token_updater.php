<?php
function Token_updater()
{
    // gets the Token Data
    $accessTokenData = file_get_contents("access_tokens.json", false);
    $accessTokenData = json_decode($accessTokenData, true);
    // deconstructs the Data
    $accessToken = $accessTokenData["access_token"];
    $accessTokenExpiredate = $accessTokenData["ExpiresAt"]["date"];
    // calculates the remaining time
    $remainingTime = strtotime($accessTokenExpiredate)-time();
    $remainingDays = ceil($remainingTime/60/60/24);
    if ($remainingDays < 40) { //only renews when there is less dann 2/3 of the time remaining before expirering
        // talks to the instagram api and renews the token
        $curl_session = curl_init();
        $url = "https://graph.instagram.com/refresh_access_token
        ?grant_type=ig_refresh_token
        &access_token=" . $accessToken;
        curl_setopt($curl_session, CURLOPT_URL, $url);
        curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl_session);
        if ($result != "false") {
                $accessTokenData = json_decode(json_encode($result), true);
                $accessToken = $accessTokenData["access_token"];
                $remainingTime = $accessTokenData["expires_in"];
                $accessTokenExpiredate = strtotime("+" . (string)$remainingTime . "s");
                $accessTokenExpiredate = date("Y-m-d H:i:s");
                $accessTokenData = array("access_token" => $accessToken, "ExpiresAt" => array("date" => $accessTokenExpiredate));
                file_put_contents("access_tokens.json", json_encode($accessTokenData));
                return $result;
        } else {
            if (curl_error($curl_session) != "") {
                return "Error: " . curl_error($curl_session);
            } else {
                return "Error!";
            }
        }
        curl_close($curl_session);
    }
}
