<?php

/////////////////////////////////////////////////////////////
// https://github.com/cosenary/Instagram-PHP-API
require_once __DIR__ . "/../libs/Instagram/instagram.class.php";
session_start();

/////////////////////////////////////////////////////////////
define("TEST_USER_ID","lucasmouilleron");
define("APPLICATION_ID","b4afb839752c465fa909f37c51a9cc2d");
define("APPLICATION_SECRET","a0831dfbc639451cb74e9acafa3cb4e2");

/////////////////////////////////////////////////////////////
$instagram = new Instagram(
    array(
        "apiKey"      => APPLICATION_ID,
        "apiSecret"   => APPLICATION_SECRET,
        "apiCallback" => "http://localhost.com/thirdPartyServices/instagram"
        )
    );

if(isset($_GET["logout"])) {
    $_SESSION["instagram_token"] = null;
}

if(isset($_GET["code"])) {
    $data = $instagram->getOAuthToken($_GET["code"]);
    $_SESSION["instagram_token"] = $data->access_token;
}

$instagram->setAccessToken($_SESSION["instagram_token"]);

?>