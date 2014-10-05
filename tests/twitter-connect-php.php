<?php
require_once __DIR__."/twitter-commons.php";

$cb = getSessionFromUserAccessToken();

if(isset($_GET["login"]) || sessionIsLogingIn()) {
  registerSession(getCurrentFullURLWithoutPrams());
}

if(isset($_GET["disconnect"])) {
  $cb = destroySession();
}

?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/header.php";?>
<h1>Connect and server side validation</h1>

<?php if(!isset($cb)):?>
  <a href="?login" class="btn btn-primary">Login with Twitter</a>
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