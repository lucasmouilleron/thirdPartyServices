<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/facebook-commons.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Access token server side pulling</h1>
<?php validateUserAccessToken()?>
<?php 

$session = new FacebookSession(USER_ACCESS_TOKEN);
$request = new FacebookRequest(
  $session,
  "GET",
  "/".TEST_USER_ID."/posts"
  );

try {
  $response = $request->execute();
  $graphObject = $response->getGraphObject();
  $posts = $graphObject->getPropertyAsArray("data");
} 
catch (FacebookRequestException $ex) {
  echo $ex->getMessage();
} 
catch (\Exception $ex) {
  echo $ex->getMessage();
}
?>
<ul>
  <?php foreach($posts as $post):?>
    <li>
      <?php echo $post->getProperty("message")?>
      <img src="<?php echo $post->getProperty("picture")?>" height="50"/>
    </li>
  <?php endforeach;?>
</ul>