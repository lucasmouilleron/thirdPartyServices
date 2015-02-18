<?php require_once __DIR__."/facebook-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<?php use Facebook\FacebookSession;?>

<!--/////////////////////////////////////////////////////////////-->
<h1>Generate long live access token from short lived token</h1>

<p>Short lived token for the app <?php echo APPLICATION_ID?> can be retrieved from the <a href="https://developers.facebook.com/tools/explorer/<?php echo APPLICATION_ID?>" target="_blank">Graph API Explorer</a></p>

<form action="<?php echo getCurrentURLWithoutParams()?>" method="post" class="form-inline">
    <div class="form-group">
        <input name="token" placeholder="A token" class="form-control" size="30"/>
    </div>
    <input type="submit" value="generate" name="submit" class="btn btn-primary"/>
</form>

<?php if(isset($_POST["token"])) :?>
    <?php
    try {
        $token = $_POST["token"];
        $session = new FacebookSession($token);
        file_put_contents("fb-long-lived-token", $session->getAccessToken()->extend());
    ?>
    <div class="alert alert-success">
        <p><strong>Long lived token is stored and is valid for 60 days</strong> <?php echo $session->getToken();?></p>
    </div>
    <pre><?php var_dump($session);?></pre>
    <?php } catch(Exception $e) {?>
    <div class="alert alert-danger">
        <p><strong>Can't generate token.</strong></p>
        <p><?php echo $e?></p>
    </div>
    <?php }?>
<?php endif;?>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>