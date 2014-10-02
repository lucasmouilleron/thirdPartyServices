<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/facebook-commons.php";
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
?>

<!--/////////////////////////////////////////////////////////////-->
<?php

if(isset($_GET["disconnect"])) {
    unset($_SESSION["fb_session_token"]);
}
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
<h1>Connect with PHP</h1>
<?php if(!isset($session)):?>
    <a href="<?php echo $helper->getLoginUrl();?>">login with PHP</a>
<?php else :?>
    <p>You are connected</p>
    <p><?php var_dump($session);?></p>
    <p><a href="?disconnect">disconnect</a></p>
<?php endif;?>

<!--/////////////////////////////////////////////////////////////-->
<script data-main="../assets/js/scripts.min" src="../assets/js/require.js"></script>
<h1>Connect with JS</h1>
<div id="facebook-connect-js" data-app-id="<?php echo APPLICATION_ID?>">
    <a href="#"><div id="fb-login">login with JS!</div></a>
    <div id="me"></div>
</div>