<?php require_once __DIR__."/facebook-commons.php";?>
<?php require_once __DIR__."/../includes/header.php";?>

<!--/////////////////////////////////////////////////////////////-->
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : "<?php echo APPLICATION_ID?>",
			xfbml      : true,
			version    : 'v2.1'
		});
	};
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script src="../assets/js/_build.js"></script>

<h1>Connect client side</h1>
<div id="facebook-connect-js">
	<form><a href="#" class="btn btn-primary"><div id="fb-login">Login with Facebook</div></a></form>
	<div id="me"></div>
</div>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>