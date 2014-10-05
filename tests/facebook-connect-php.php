<?php
require_once __DIR__."/facebook-commons.php";
require_once __DIR__."/../includes/header.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Connect and server side validaton</h1>

<?php

// disconnect
if(isset($_GET["disconnect"])) {
    $session = destroyUserAccessTokenSession();
}

// try to retrieve session from stored user access token
$session = getSessionFromUserAccessToken();

// if failed, try to get from URL if we come back from Facebook
if(!isset($session)) {
    $helper = new FacebookRedirectLoginHelper(curPageURL(false));
    $session = $helper->getSessionFromRedirect();
    if(isset($session)) {
        $session = registerSessionFromUserAccessToken($session->getToken());
    }
}

?>

<?php if(!isset($session)):?>
    <a href="<?php echo $helper->getLoginUrl();?>" class="btn btn-primary">Login with Facebook</a>
<?php else :?>
    <div class="alert alert-success">
        <p><strong>You are connected</strong></p>
        <p>Token : <?php echo $session->getToken();?></p>
    </div>
    <pre><?php var_dump($session);?></pre>
    <p><a href="?disconnect" class="btn btn-danger">Disconnect</a></p>
<?php endif;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>