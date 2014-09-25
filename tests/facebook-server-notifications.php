  <?php

/////////////////////////////////////////////////////////////
require_once "facebook-commons.php";
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

/////////////////////////////////////////////////////////////
FacebookSession::setDefaultApplication(APPLICATION_ID, APPLICATION_SECRET);
$session = new FacebookSession(APPLICATION_ID."|".APPLICATION_SECRET);

/////////////////////////////////////////////////////////////
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
    echo "sent !";
} 
catch (FacebookRequestException $ex) {
  echo $ex->getMessage();
} 
catch (\Exception $ex) {
  echo $ex->getMessage();
}


?>