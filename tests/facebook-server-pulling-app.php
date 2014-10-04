<?php
require_once __DIR__."/facebook-commons.php";
require_once __DIR__."/../includes/header.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>App token server side pulling</h1>

<?php

$session = new FacebookSession(APPLICATION_ID."|".APPLICATION_SECRET);
$request = new FacebookRequest(
  $session,
  "GET",
  "/".TEST_USER_ID."/photos/uploaded"
  );

try {
  $response = $request->execute();
  $graphObject = $response->getGraphObject();
  $photos = $graphObject->getPropertyAsArray("data");
} 
catch (FacebookRequestException $ex) {
  echo $ex->getMessage();
} 
catch (\Exception $ex) {
  echo $ex->getMessage();
}

?>

<?php $i=1;?>
<?php foreach($photos as $photo):?>
  <div>
    <h3>Item <?php echo $i?></h3>
    <p><?php echo $photo->getProperty("link")?></p>
    <p>
      <img src="<?php echo $photo->getProperty("picture")?>" height="50"/>
    </p>
    <pre><code class="json"><?php var_dump($photo)?></code></pre>
  </div>
  <?php $i++;?>
<?php endforeach;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>