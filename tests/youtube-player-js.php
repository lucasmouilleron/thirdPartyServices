<?php
require_once __DIR__."/youtube-commons.php";
require_once __DIR__."/../includes/header.php";
?>

<!--/////////////////////////////////////////////////////////////-->
<div id="youtube-player-js">
    <video id="video" data-video-id="<?php echo VIDEO_TEST2_ID?>" class="video-js vjs-default-skin"></video>
</div>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>