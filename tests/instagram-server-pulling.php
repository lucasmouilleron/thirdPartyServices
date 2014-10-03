<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/../includes/header.php";
require_once __DIR__."/instagram-commons.php";
?>

<!-- /////////////////////////////////////////////////////////////-->
<h1>Server side pulling as app (#nike)</h1>
<?php
$instagram = new Instagram(APPLICATION_ID, APPLICATION_SECRET);
$result = $instagram->getTagMedia("nike");
?>

<?php $j=1;?>
<?php for($i=0; $i<2; $i++) :?>
    <?php foreach ($result->data as $media) :?>
        <h3>Item <?php echo $j?></h3>
        <p><img src="<?php echo $media->images->low_resolution->url?>" width="100"/> @ <?php echo $media->user->username?></p>
        <pre><code class="json"><?php var_dump($media)?></code></pre>
        <?php $j++;?>
    <?php endforeach;?>
    <?php $result = $instagram->pagination($result); ?>    
<?php endfor; ?>


<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>