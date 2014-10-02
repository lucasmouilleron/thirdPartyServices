<?php

require_once __DIR__."/youtube-commons.php";
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/main.css">
    <script data-main="../assets/js/scripts.min" src="../assets/js/require.js"></script>
    <!--<script src="../dev/js/vendor/video2.js"></script>
    <script src="../dev/js/vendor/youtube.js"></script>-->
</head>
<body>

<div id="youtube-player-js">
    <video id="video" data-video-id="<?php echo VIDEO_TEST2_ID?>" class="video-js vjs-default-skin"></video>
</div>

<!--<video id="vid1" src="" class="video-js vjs-default-skin" controls preload="auto" width="640" height="360" data-setup='{ "techOrder": ["youtube"], "src": "http://www.youtube.com/watch?v=xjS6SftYQaQ" }'>
</video>-->

</body>
</html>