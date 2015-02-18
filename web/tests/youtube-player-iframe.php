<?php
require_once __DIR__."/youtube-commons.php";
require_once __DIR__."/../includes/header.php";
?>

<!--/////////////////////////////////////////////////////////////-->
<div>
    <p>Simple integration</p>
    <iframe src="http://www.youtube.com/v/<?php echo VIDEO_TEST_ID?>?version=3" width="400" height="300" style="border:none"></iframe>
</div>

<div>
<p>Custom parameters, based on <a target="_blank" href="https://developers.google.com/youtube/player_parameters">youtube doc</a></p>
    <iframe src="http://www.youtube.com/v/<?php echo VIDEO_TEST2_ID?>?version=3&enablejsapi=1&autohide=1&cc_load_policy=1&controls=0&rel=0&modestbranding=1&showinfo=0&disablekb=1&autoplay=1" width="400" height="300" style="border:none"></iframe>
</div>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>