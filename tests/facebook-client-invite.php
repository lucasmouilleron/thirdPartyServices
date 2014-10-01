<?php require_once __DIR__."/facebook-commons.php";?>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : "<?php echo APPLICATION_ID?>",
            xfbml      : true,
            version    : "v2.1"
        });
        FB.getLoginStatus(function(response) {
            if (response.status === "connected") {
                FB.ui({method: "apprequests",
                    message: "Invite test",
                    to: "<?php echo TEST_USER_ID?>"
                }, function(response){
                    console.log(response);
                });
            }
            else {
                FB.login();
            }
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "facebook-jssdk"));
</script>