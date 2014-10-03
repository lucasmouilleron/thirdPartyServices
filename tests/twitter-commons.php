<?php

/////////////////////////////////////////////////////////////
define("TEST_USER_ID","lucasmouilleron");
define("APPLICATION_ID","MhIo1n4ZD66IUItsR9jw");
define("APPLICATION_SECRET","qU9l6Y7pUF56CFlkRgutA1YTCbXWKgMvpylB2rLy8");
define("ACCESS_TOKEN","255388885-KFdPqPCFSRh5F1i1C6zk1V0OXFTbaGpvG2drYYh4");
define("ACCESS_TOKEN_SECRET","7YmCJ84627Ko5oGKwXSYdGzZgzgpauZK81UtBta6Do2T3");
define("HASHTAG_TEST","#1dosedamour");

/////////////////////////////////////////////////////////////
// https://github.com/jublonet/codebird-php
// https://github.com/fennb/phirehose
require_once __DIR__ . "/../libs/Codebird/codebird.php";
require_once __DIR__ . "/../libs/Phirehose/Phirehose.php";
require_once __DIR__ . "/../libs/Phirehose/OauthPhirehose.php";
require  __DIR__."/../libs/tools.php";
session_start();

/////////////////////////////////////////////////////////////
\Codebird\Codebird::setConsumerKey(APPLICATION_ID, APPLICATION_SECRET);
configureAppToken();

/////////////////////////////////////////////////////////////
function configureAppToken() {
    $cb = \Codebird\Codebird::getInstance();
    if(isset($_SESSION["tt_token"])) 
    {
      \Codebird\Codebird::setBearerToken($_SESSION["tt_token"]);
  }
  else 
  {
      $reply = $cb->oauth2_token();
      $_SESSION["tt_token"] = $reply->access_token;
  }
}

?>