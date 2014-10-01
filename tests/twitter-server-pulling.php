<?php

/////////////////////////////////////////////////////////////
require_once __DIR__."/twitter-commons.php";

/////////////////////////////////////////////////////////////
\Codebird\Codebird::setConsumerKey(APPLICATION_ID, APPLICATION_SECRET);
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

/////////////////////////////////////////////////////////////
$maxID = 0;
if(isset($_GET["maxID"])) {
  $maxID =   $_GET["maxID"];
}
$reply = $cb->search_tweets("q=#1dosedamour&max_id=".$maxID, true);  
?>

<ul>
  <?php foreach ($reply->statuses as $status) :?>
    <?php $maxID = $status->id;?>
    <li><?php echo $status->text?> @ <?php echo $status->user->screen_name?></li>
  <?php endforeach;?>
</ul>

<a href="<?php echo $_SERVER["PHP_SELF"]?>">reset</a> | <a href="<?php echo $_SERVER["PHP_SELF"]?>?maxID=<?php echo $maxID?>">next</a>