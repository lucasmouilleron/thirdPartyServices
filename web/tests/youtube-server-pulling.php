<?php require_once __DIR__."/youtube-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Server side pulling (playlist <?php echo YOUTUBE_PLAYLIST_ID?>)</h1>

<?php 
$cache = new SimpleCache();
$cache->cache_path = CACHE_PATH;
$cache->cache_time = 1000;
$videos = unserialize($cache->get_cache("yt-videos-".YOUTUBE_PLAYLIST_ID));
if($videos == "")
{
    $client = new Google_Client();
    $client->setDeveloperKey(YOUTUBE_API_KEY);
    $youtube = new Google_Service_YouTube($client);
    $videosResponse = $youtube->playlistItems->listPlaylistItems("contentDetails", array("playlistId" => YOUTUBE_PLAYLIST_ID));
    $videos = Array();
    foreach ($videosResponse['items'] as $video) {
        $videos[] = $video["contentDetails"]["videoId"];
    }
    $cache->set_cache("yt-videos-".YOUTUBE_PLAYLIST_ID, serialize($videos));
}
?>

<?php foreach ($videos as $video) :?>
    <iframe class="ytvideo" src="http://www.youtube.com/embed/<?php echo $video?>?autoplay=0&rel=0&modestbranding=1&controls=2" frameborder="0"></iframe>
<?php endforeach;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>