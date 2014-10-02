<!--/////////////////////////////////////////////////////////////-->
<?php 
require_once __DIR__."/facebook-commons.php";
use Facebook\FacebookSession;

?>

<h1>Generate long live access token from short lived token</h1>
<p>Short lived token for the app <?php echo APPLICATION_ID?> can be retrieved from the <a href="https://developers.facebook.com/tools/explorer/<?php echo APPLICATION_ID?>" target="_blank">Graph API Explorer</a></p>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
    <input name="token"/>
    <input type="submit" value="generate" name="submit"/>
</form>

<?php

if(isset($_POST["token"])) {
    try {
        $token = $_POST["token"];
        $session = new FacebookSession($token);
        file_put_contents("fb-long-lived-token", $session->getAccessToken()->extend());
        echo "Long lived token is stored and is valid for 60 days (auto renewed when used)";
    }
    catch(Exception $e) {
        echo "Can't generate : ".$e;
    }
}

?>