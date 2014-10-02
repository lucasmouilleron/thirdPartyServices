<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/facebook-commons.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Connect and server side validaton</h1>

<?php

$session = getSessionFromUserAccessToken();

if(isset($_GET["disconnect"])) {
    $session = destroyUserAccessTokenSession();
}

if(!isset($session)) {
    $helper = new FacebookRedirectLoginHelper(curPageURL(false));
    $session = $helper->getSessionFromRedirect();
    if(isset($session)) {
        $session = registerSessionFromUserAccessToken($session->getToken());
    }
}

?>

<?php if(!isset($session)):?>
    <a href="<?php echo $helper->getLoginUrl();?>">login with PHP</a>
<?php else :?>
    <p>You are connected with the token <?php echo $session->getToken();?></p>
    <p><?php var_dump($session);?></p>
    <p><a href="?disconnect">disconnect</a></p>
<?php endif;?>