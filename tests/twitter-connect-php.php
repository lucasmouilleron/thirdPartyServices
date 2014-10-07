<?php
require_once __DIR__."/twitter-commons.php";

// try to retrieve session from sesssion stored user access token
$cb = getSessionFromUserAccessToken();


// OAuth 1.0 flow
if(isset($_GET["login"]) || sessionIsLogingIn()) {
  registerSession(getCurrentFullURLWithoutPrams());
}

// disconnect
if(isset($_GET["disconnect"])) {
  $cb = destroySession();
}

?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/header.php";?>
<h1>Connect and server side validation</h1>

<?php if(!isset($cb)):?>
  <p><a href="?login" class="btn btn-primary">Login with Twitter</a></p>
  <p>OAuth 1.0 Redirection URI : <?php echo getCurrentFullURLWithoutPrams()?>
  <p>OAuth 1.0 official registered domain : localhost.com</p>
<?php else :?>
  <div class="alert alert-success">
    <p><strong>You are connected</strong></p>
    <p>Token : <?php echo getSessionAuthToken();?></p>
  </div>
  <pre><?php var_dump($cb);?></pre>
  <p><a href="?disconnect" class="btn btn-danger">Disconnect</a></p>
<?php endif;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>