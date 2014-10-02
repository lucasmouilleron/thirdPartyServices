<!--/////////////////////////////////////////////////////////////-->
<?php require_once __DIR__."/twitter-commons.php"; ?>

<!--/////////////////////////////////////////////////////////////-->
<?php


$cb = \Codebird\Codebird::getInstance();
$maxID = 0;
if(isset($_GET["maxID"])) {
  $maxID =   $_GET["maxID"];
}
$reply = $cb->search_tweets("q=".HASHTAG_TEST."&max_id=".$maxID, true);  
?>

<h1>App token server side pulling (<?php echo HASHTAG_TEST?>)</h1>
<ul>
  <?php foreach ($reply->statuses as $status) :?>
    <?php $maxID = $status->id;?>
    <li>
      <div><?php echo $status->text?> @ <?php echo $status->user->screen_name?></div>
      <?php if(isset($status->entities->media)):?>
        <div>
          <?php foreach($status->entities->media as $media):?>
            <img src="<?php echo $media->media_url?>" height="40"/> 
          <?php endforeach;?>
        </div>
      <?php endif;?>
    </li>
  <?php endforeach;?>
</ul>

<a href="<?php echo $_SERVER["PHP_SELF"]?>">reset</a> | <a href="<?php echo $_SERVER["PHP_SELF"]?>?maxID=<?php echo $maxID?>">next</a>