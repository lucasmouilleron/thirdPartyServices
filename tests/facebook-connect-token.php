<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/facebook-commons.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Connect with token and server side validation</h1>

<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
    <input name="token"/>
    <input type="submit" value="login from token" name="submit"/>
</form>

<?php if(isset($_POST["token"])) :?>
    <?php $session = registerSessionFromUserAccessToken($_POST["token"]);?>
<?php endif;?>

<?php $session = getSessionFromUserAccessToken();?>
<?php if(isset($session)):?>    
    <p>You are connected with the token <?php echo $session->getToken();?></p>
    <p><?php var_dump($session);?></p>
<?php endif;?>
