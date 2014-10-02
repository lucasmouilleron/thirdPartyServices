<!--/////////////////////////////////////////////////////////////-->
<?php require_once __DIR__."/twitter-commons.php"; ?>

<!--/////////////////////////////////////////////////////////////-->
<?php
$cb = \Codebird\Codebird::getInstance();
$cb->setToken(ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$maxID = 0;
if(isset($_GET["maxID"])) {
  $maxID =   $_GET["maxID"];
}
$statuses = (array) $cb->statuses_homeTimeline("?max_id=".$maxID);
?>

<h1>User token server side pulling</h1>
<ul>
  <?php foreach ($statuses as $status) :?>
    <?php if(isset($status->text)):?>
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
    <?php endif;?>
  <?php endforeach;?>
</ul>

<a href="<?php echo $_SERVER["PHP_SELF"]?>">reset</a> | <a href="<?php echo $_SERVER["PHP_SELF"]?>?maxID=<?php echo $maxID?>">next</a>