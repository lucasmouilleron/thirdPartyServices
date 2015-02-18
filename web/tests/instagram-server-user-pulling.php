<?php require_once __DIR__."/instagram-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<!-- /////////////////////////////////////////////////////////////-->
<h1>Server side pulling as user</h1>
<?php if(isset($_SESSION["instagram_token"])):?>
    <?php $j=1;?>
    <?php foreach ($instagram->getUserMedia()->data as $media) :?>
        <h3>Item <?php echo $j?></h3>
        <p><img src="<?php echo $media->images->low_resolution->url?>" width="100"/> @ <?php echo $media->user->username?></p>
        <pre><code class="json"><?php var_dump($media)?></code></pre>
        <?php $j++;?>
    <?php endforeach;?>
    <a href="<?php echo $instagram->getApiCallback()?>?logout" class="btn btn-danger">Logout</a>
<?php else: ?>
    <a href="<?php echo $instagram->getLoginUrl()?>" class="btn btn-primary">Login with Instagram</a>
<?php endif;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>