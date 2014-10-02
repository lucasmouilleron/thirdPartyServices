<!-- /////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/instagram-commons.php";
?>

<!-- /////////////////////////////////////////////////////////////-->
<h1>Server side pulling as user</h1>
<?php if(isset($_SESSION["instagram_token"])):?>
    <ul>
        <?php foreach ($instagram->getUserMedia()->data as $media) :?>
            <li><img src="<?php echo $media->images->low_resolution->url?>" width="100"/> @ <?php echo $media->user->username?></li>
        <?php endforeach;?>
    </ul>
    <a href="<?php echo $instagram->getApiCallback()?>?logout">Logout</a>
<?php else: ?>
    <a href="<?php echo $instagram->getLoginUrl()?>">Login with Instagram</a>
<?php endif;?>