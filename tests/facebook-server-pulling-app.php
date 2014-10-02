<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/facebook-commons.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
?>

<!--/////////////////////////////////////////////////////////////-->
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

<h1>App token server side pulling</h1>
<?php foreach($photos as $photo):?>
  <img src="<?php echo $photo->getProperty("picture")?>" height="50"/>
<?php endforeach;?>