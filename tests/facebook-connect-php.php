<?php require_once __DIR__."/facebook-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<?php
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Connect and server side validaton</h1>

<?php

// try to retrieve session from sesssion stored user access token
$session = getSessionFromUserAccessToken();

// if failed, OAuth 2.0 exchange code for user access token
if(!isset($session)) {
    $session = registerSessionFromRedirectUrl(curPageURL(false));
}

// disconnect
if(isset($_GET["disconnect"])) {
    $session = destroyUserAccessTokenSession();
}

?>

<?php if(!isset($session)):?>
    <p><a href="<?php echo getLoginURL(curPageURL(false));?>" class="btn btn-primary">Login with Facebook</a></p>
    <p>OAuth 2.0 Redirect URI : <?php echo curPageURL(false)?></p>
    <p>OAuth 2.0 official registered domain : localhost.com</p>
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