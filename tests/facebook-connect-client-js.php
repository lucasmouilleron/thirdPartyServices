<!--/////////////////////////////////////////////////////////////-->
<?php
require_once __DIR__."/facebook-commons.php";
?>

<!--/////////////////////////////////////////////////////////////-->
<script data-main="../assets/js/scripts.min" src="../assets/js/require.js"></script>
<h1>Connect client side</h1>
<div id="facebook-connect-js" data-app-id="<?php echo APPLICATION_ID?>">
    <a href="#"><div id="fb-login">login with JS!</div></a>
    <div id="me"></div>
</div>