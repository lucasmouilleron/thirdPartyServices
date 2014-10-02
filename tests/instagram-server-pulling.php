<!-- /////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/instagram-commons.php";
?>

<!-- /////////////////////////////////////////////////////////////-->
<h1>Server side pulling as app (#nike)</h1>
<?php
$instagram = new Instagram(APPLICATION_ID, APPLICATION_SECRET);
$result = $instagram->getTagMedia("nike");
?>

<ul>
    <?php for($i=0; $i<2; $i++) :?>
      <?php foreach ($result->data as $media) :?>
        <li><img src="<?php echo $media->images->low_resolution->url?>" width="100"/> @ <?php echo $media->user->username?></li>
    <?php endforeach;?>
    <?php $result = $instagram->pagination($result); ?>
<?php endfor; ?>
</ul>