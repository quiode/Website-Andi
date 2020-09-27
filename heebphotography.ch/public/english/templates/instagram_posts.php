<?php
function insta_post_url_getter($insta_user_url)
{
    // gets the json of the first 10 or so posts
    $file_contents = file_get_contents($insta_user_url . "?__a=1");
    print_r($file_contents);
    
    $allpages = [];
    // seraches the url ending for every post and adds them to allpages
    while (substr_count($file_contents, "shortcode") > 0) {
        $name_length = 12;
        $link_position = strpos($file_contents, "shortcode") + $name_length;
        $link_length = 11;
        $link = substr($file_contents, $link_position, $link_length);
        array_push($allpages, $link);
        $file_contents = substr_replace($file_contents, "", strpos($file_contents, "shortcode"), $link_length+$name_length);
    }
    // formats the final version to make a real link
    $insta_link = "https://www.instagram.com/p/";
    $all_posts = [];
    for ($i=0; $i < sizeof($allpages); $i++) {
        array_push($all_posts, $insta_link . $allpages[$i] . "/");
    }
    return $all_posts;
}

// print_r(insta_post_url_getter("https://www.instagram.com/heebphotography/"));
function insta_html_getter($posts_urls)
{
    // gets the raw json information for every post and returns just the html
    $all_html = [];
    for ($i=0; $i < sizeof($posts_urls); $i++) {
        $file_contents = file_get_contents("https://graph.facebook.com/v8.0/instagram_oembed?url=" . $posts_urls[$i] . "&access_token=1205071169874559|JqqcH3Zozl5Nh26TUzci4v5xIhQ");
        $json_array = json_decode($file_contents, true);
        array_push($all_html, $json_array["html"]);
    }
    return $all_html;
}
