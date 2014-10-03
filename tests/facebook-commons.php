<?php

/////////////////////////////////////////////////////////////
define("TEST_USER_ID","10204287996096307");
//define("TEST_USER_ID","100001710357438");
define("APPLICATION_ID","140025316173237");
define("APPLICATION_SECRET","b531e3337a72646da87a01bab08b0070");

/////////////////////////////////////////////////////////////
require  __DIR__."/../libs/Facebook/autoload.php";
require  __DIR__."/../libs/tools.php";

/////////////////////////////////////////////////////////////
use Facebook\FacebookSession;
session_start();
FacebookSession::setDefaultApplication(APPLICATION_ID, APPLICATION_SECRET);
FacebookSession::enableAppSecretProof(false);


/////////////////////////////////////////////////////////////
function validateServerSideLongLivedUserAccessToken() {

  if(!file_exists("fb-long-lived-token")) {
    die("<a href='facebook-generate-long-token' target='_blank'>generate long lived access token first</a>");
  }
  try {
    $token = file_get_contents("fb-long-lived-token");
    $session = new FacebookSession($token);
    $session->validate();
    return $token;
  } 
  catch (Exception $e) {
    die("Can't validate sessions, <a href='facebook-generate-long-token' target='_blank'>generate long lived access token first</a>");
  }
}

/////////////////////////////////////////////////////////////
function destroyUserAccessTokenSession() {
  unset($_SESSION["fb_session_token"]);
  return null;
}

/////////////////////////////////////////////////////////////
function registerSessionFromUserAccessToken($token) {
  try {
    $_SESSION["fb_session_token"] = $token;
    return getSessionFromUserAccessToken();
  } catch (Exception $e) {
    return null;
  }
}

/////////////////////////////////////////////////////////////
function getSessionFromUserAccessToken() {

  if(isset($_SESSION["fb_session_token"])) {
    try {
      $session  = new FacebookSession($_SESSION["fb_session_token"]);
      $session->validate();
      return $session;
    }
    catch (Exception $e) {
      destroyUserAccessTokenSession();
      die("Can't validate session token");
    }
  }
  return null;
}


/////////////////////////////////////////////////////////////
function curPageURL($withQuery) {
 $pageURL = 'http';

 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
if(!$withQuery) {
  return strtok($pageURL,"?");
}
else {
  return $pageURL;  
}

}

?>