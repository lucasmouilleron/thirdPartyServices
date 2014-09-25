<?php

/////////////////////////////////////////////////////////////
require  __DIR__."/../libs/Facebook/autoload.php";
session_start();

/////////////////////////////////////////////////////////////
define("TEST_USER_ID","10204243294218788");
//define("TEST_USER_ID","100001710357438");
define("APPLICATION_ID","629604657156333");
define("APPLICATION_SECRET","7647d3de5484dc997898dab3546f0f5e");

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