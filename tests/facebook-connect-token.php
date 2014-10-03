<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/../includes/header.php";
require_once __DIR__."/facebook-commons.php";
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Connect with token and server side validation</h1>

<form class="form-inline" action="<?php echo getCurrentURLWithoutParams()?>" method="post">
    <div class="form-group">
        <input name="token" class="form-control" placeholder="A token" size="40"/>
    </div>
    <input type="submit" value="login from token" name="submit" class="btn btn-primary" />
</form>

<?php if(isset($_POST["token"])) :?>
    <?php $session = registerSessionFromUserAccessToken($_POST["token"]);?>
    <?php if (!isset($session)):?>
        <div class="alert alert-danger">
            <p><strong>Can't valide token.</strong></p>
            <p>Short lived token for the app <?php echo APPLICATION_ID?> can be retrieved from the <a href="https://developers.facebook.com/tools/explorer/<?php echo APPLICATION_ID?>" target="_blank">Graph API Explorer</a></p>
        </div>
    <?php endif;?>
    
<?php endif;?>

<?php $session = getSessionFromUserAccessToken();?>
<?php if(isset($session)):?>    
    <div class="alert alert-success">
        <p><strong>You are connected with the token</strong> <?php echo $session->getToken();?></p>
    </div>
    <pre><?php var_dump($session);?></pre>
    
<?php endif;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php"; ?>