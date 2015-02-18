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
require_once  __DIR__."/../libs/tools.php";
session_start();

/////////////////////////////////////////////////////////////
\Codebird\Codebird::setConsumerKey(APPLICATION_ID, APPLICATION_SECRET);
configureAppToken();

/////////////////////////////////////////////////////////////
function getSessionFromUserAccessToken() {
  $cb = \Codebird\Codebird::getInstance();
  if(isset($_SESSION["tt_access_token"])) {
    $cb->setToken($_SESSION["tt_access_token"], $_SESSION["tt_access_token_secret"]);
    return $cb;
  }
  else {
    return null;
  }
}

/////////////////////////////////////////////////////////////
function destroySession() {
  unset($_SESSION["tt_access_token"]);
  unset($_SESSION["tt_access_token_secret"]);
  return null;
}

/////////////////////////////////////////////////////////////
function sessionIsLogingIn() {
  return isset($_SESSION["tt_oauth_verify"]);
}

/////////////////////////////////////////////////////////////
function getSessionAuthToken() {
  return $_SESSION["tt_access_token"];
}

/////////////////////////////////////////////////////////////
function registerSession($callbackURL) {
  $cb = \Codebird\Codebird::getInstance();
  if (!isset($_SESSION["tt_oauth_verify"])) {
    // get the request token
    $reply = $cb->oauth_requestToken(array(
      "oauth_callback" => $callbackURL
      ));

    // store the token
    $cb->setToken($reply->oauth_token, $reply->oauth_token_secret);
    $_SESSION["tt_oauth_token"] = $reply->oauth_token;
    $_SESSION["tt_oauth_token_secret"] = $reply->oauth_token_secret;
    $_SESSION["tt_oauth_verify"] = true;

    // redirect to auth website
    $auth_url = $cb->oauth_authorize();
    header("Location: " . $auth_url);
    die();

  } elseif (isset($_GET["oauth_verifier"]) && sessionIsLogingIn()) {
    // verify the token
    $cb->setToken($_SESSION["tt_oauth_token"], $_SESSION["tt_oauth_token_secret"]);
    unset($_SESSION["tt_oauth_verify"]);
    unset($_SESSION["tt_oauth_token"]);
    unset($_SESSION["tt_oauth_token_secret"]);

    // get the access token
    $reply = $cb->oauth_accessToken(array(
      "oauth_verifier" => $_GET["oauth_verifier"]
      ));

    // store the token (which is different from the request token!)
    $_SESSION["tt_access_token"] = $reply->oauth_token;
    $_SESSION["tt_access_token_secret"] = $reply->oauth_token_secret;

    // send to same URL, without oauth GET parameters
    header("Location: " . $callbackURL);
    die();
  }
}

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