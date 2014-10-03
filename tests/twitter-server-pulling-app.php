<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/../includes/header.php";
require_once __DIR__."/twitter-commons.php";
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>App token server side pulling (<?php echo HASHTAG_TEST?>)</h1>


<?php
$cb = \Codebird\Codebird::getInstance();
$maxID = 0;
if(isset($_GET["maxID"])) {
  $maxID =   $_GET["maxID"];
}
$statuses = $cb->search_tweets("q=".HASHTAG_TEST."&max_id=".$maxID, true)->statuses;  
?>

<?php $i=1;?>
<?php foreach ($statuses as $status) :?>
  <?php if(isset($status->text)):?>
    <?php $maxID = $status->id;?>
    <div>
      <h3>Item <?php echo $i?></h3>
      <p><?php echo $status->text?> @ <?php echo $status->user->screen_name?></p>
      <?php if(isset($status->entities->media)):?>
        <p>
          <?php foreach($status->entities->media as $media):?>
            <img src="<?php echo $media->media_url?>" height="40"/> 
          <?php endforeach;?>
        </p>
      <?php endif;?>
      <pre><code class="json"><?php var_dump($status)?></code></pre>
    </div>
    <?php $i++;?>
  <?php endif;?>
<?php endforeach;?>

<a href="<?php echo $_SERVER["PHP_SELF"]?>">reset</a> | <a href="<?php echo $_SERVER["PHP_SELF"]?>?maxID=<?php echo $maxID?>">next</a>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>