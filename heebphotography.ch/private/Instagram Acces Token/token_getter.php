<?php

use Facebook\Facebook;

require "defines.php";

    // load graph-sdk files
    require_once __DIR__ . "/../../../vendor/autoload.php";

    // facebook credentials array
    $creds = array(
        "app_id" => FACEBOOK_APP_ID,
        "app_secret" => FACEBOOK_APP_SECRET,
        "default_graph_verison" => "v3.2",
        "persistent_data_handler" => "session",
    );

    // creade facebook object
    $facebook = new Facebook($creds);

    // helper
    $helper = $facebook->getRedirectLoginHelper();

    // oautch object
    $oAuth2Client = $facebook->getOAuth2Client();

    if (isset($_GET["code"])) { //get acces token
        try {
            $accesToken = $helper->getAccessToken();
        } catch (\Facebook\Exceptions\FacebookResponseException $e) { //graph error
            echo "Graph returned an error " . $e->getMessage;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) { //validate error
            echo "Facebook SDK returned an error " . $e->getMessage;
        }

        echo '<h1>Short Lived Access Token</h1>';
        print_r((string)$accesToken);

        if (!$accesToken->isLongLived()) { //exchange short for long
            try {
                $accesToken = $oAuth2Client->getLongLivedAccessToken($accesToken);
            } catch (\Facebook\Exceptions\FacebookSDKException $e) {
                echo "Error getting long lived access token " . $e->getMessage();
            }
        }

        echo '<h1>Long Lived Access Token</h1>';
        print_r((string)$accesToken);
    } else { //display login url
        $permissions = ["public_profile", "instagram_basic", "pages_show_list"];
        $loginUrl = $helper->getLoginUrl(FACEBOOK_REDIRECT_URI, $permissions);

        echo '<a href="' . $loginUrl . '">
            Login with Facebook
        </a>';
    };
