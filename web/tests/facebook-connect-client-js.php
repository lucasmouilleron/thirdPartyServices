<?php require_once __DIR__."/facebook-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<!--/////////////////////////////////////////////////////////////-->
<script src="../assets/js/_build.js"></script>

<h1>Connect client side</h1>
<div id="facebook-connect-js" data-app-id="<?php echo APPLICATION_ID?>" data-user-id="<?php echo TEST_USER_ID?>">
	<form><a href="#" class="btn btn-primary"><div id="fb-login">Login with Facebook</div></a></form>
	<div id="me"></div>
</div>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>