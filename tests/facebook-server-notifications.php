<?php require_once __DIR__."/facebook-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<?php
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Server side notification</h1>
<?php 

$session = new FacebookSession(APPLICATION_ID."|".APPLICATION_SECRET);
$request = new FacebookRequest(
  $session,
  "POST",
  "/".TEST_USER_ID."/notifications",
  array (

    "template" => "This is a test message",
    )
  );

try {
  $response = $request->execute();
  $graphObject = $response->getGraphObject();
  echo "<div class='alert alert-success'>sent !</div>";
} 
catch (\Exception $ex) {
  echo "<div class='alert alert-success'>Error  : ".$ex->getMessage()."</div>";
}

?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>