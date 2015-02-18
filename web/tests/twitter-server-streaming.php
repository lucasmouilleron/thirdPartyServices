<?php

/////////////////////////////////////////////////////////////
require_once __DIR__."/twitter-commons.php";

/////////////////////////////////////////////////////////////
class MyStream extends OauthPhirehose
{
  public function enqueueStatus($status)
  {
    echo $status;
  }
}

if(php_sapi_name() !== "cli") {
    die("run from php cli");
}

$stream = new MyStream(ACCESS_TOKEN, ACCESS_TOKEN_SECRET, Phirehose::METHOD_FILTER);
$stream->consumerKey = APPLICATION_ID;
$stream->consumerSecret = APPLICATION_SECRET;
$stream->setTrack(array("#aaple"));
$stream->consume();
?>