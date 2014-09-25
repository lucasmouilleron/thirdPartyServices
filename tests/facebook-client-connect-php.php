<?php

/////////////////////////////////////////////////////////////
require_once "facebook-commons.php";
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;

/////////////////////////////////////////////////////////////
if(isset($_GET["disconnect"])) {
    unset($_SESSION["fb_session_token"]);
}
FacebookSession::setDefaultApplication(APPLICATION_ID, APPLICATION_SECRET);
if(isset($_SESSION["fb_session_token"])) {
    $session  = new FacebookSession($_SESSION["fb_session_token"]);
}

if(!isset($session)) {
    try {
        $helper = new FacebookRedirectLoginHelper(curPageURL(false));
        $session = $helper->getSessionFromRedirect();
        if(isset($session)) {
            $_SESSION["fb_session_token"] = $session->getToken();
        }
    } 
    catch(FacebookRequestException $ex) {
    } 
    catch(\Exception $ex) {
    }
}
?>

<?php if(!isset($session)):?>
    <a href="<?php echo $helper->getLoginUrl();?>">login</a>
<?php else :?>
    <p>You are connected</p>
    <p><?php var_dump($session);?></p>
    <p><a href="?disconnect">disconnect</a></p>
<?php endif;?>
