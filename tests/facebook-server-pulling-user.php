<?php require_once __DIR__."/facebook-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<?php 
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Access token server side pulling</h1>

<?php $token = validateServerSideLongLivedUserAccessToken()?>
<?php 

$session = new FacebookSession($token);
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

<?php $i=1;?>
<?php foreach($posts as $post):?>
  <div>
    <h3>Item <?php echo $i?></h3>
    <p><?php echo $post->getProperty("message")?></p>
    <p>
      <img src="<?php echo $post->getProperty("picture")?>" height="50"/>
    </p>
    <pre><code class="json"><?php var_dump($post)?></code></pre>
  </div>
  <?php $i++;?>
<?php endforeach;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>