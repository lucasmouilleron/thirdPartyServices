/////////////////////////////////////////////////////////////////////
// LIBRARIES CONFIG
/////////////////////////////////////////////////////////////////////
require.config({
// libraries paths
paths: {
// main libs
"jquery": "vendor/jquery-1.8.2.min",
"bootstrap": "vendor/bootstrap.min",
// utils
"tools": "tools",
"console": "vendor/console",
"toc": "vendor/toc.min",
"video" : "vendor/video",
"videoYoutube" : "vendor/video-youtube",
"facebook": "//connect.facebook.net/en_US/all",
"cookie":"vendor/jquery.cookie"
},
// dependencies and exports
shim: {
    "bootstrap": ["jquery"],
    "throbber": ["jquery"],
    "console": ["jquery"],
    "tools": ["jquery"],
    "toc": ["jquery"],
    "videoYoutube": {"deps":["video"], exports: "videojs"},
    "cookie": ["jquery"],
    "facebook" : {exports: "FB"}
}
});

/////////////////////////////////////////////////////////////////////
// BOOTSRAP !!!!
/////////////////////////////////////////////////////////////////////
require(["jquery", "videoYoutube", "facebook", "bootstrap", "console", "tools","toc","cookie"], function($,videoYoutube, fb) {
    $(function() {

        if($("#toc").length) {
            $("#toc").affix({
                offset: {
                    top: $("#toc").offset().top-$(".navbar").height()
                }
            });
            $("#toc").toc({
                "selectors": "h1,h2,h3",
                "container": "#guidelines",
                "prefix": "toc",
                "scrollToOffset": 60
            });
        }

        if($("#youtube-player-js").length) {
            videoYoutube("video", { 
                "techOrder": ["youtube"], 
                "src": "http://www.youtube.com/watch?v="+$("#video").data("video-id"),
                "quality": "720p",
                "width": 400,
                "height": 225,
                "controls": true
            }).ready(function() {
                $("#video").fadeIn();
            }).on("ended", function(){
                alert("finished");
            });
        }

        if($("#facebook-connect-js").length) {
            function showMe() {
                fb.api("/me", function(response) {
                    $("#me").html("<pre>"+JSON.stringify(response)+"</pre>");
                });
            }
            fb.init({
                appId : $("#facebook-connect-js").data("app-id")
            });
            
            fb.getLoginStatus(function(response) {
                $("#me").html("login in with cookie token");
                if (response.status === 'connected') {
                    //$("#fb-login").hide();
                    showMe();
                }
            });
            $("#fb-login").click(function() {
                fb.login(function(response) {
                    if (response.status === "connected") {
                        console.log(response.authResponse.accessToken);
                        showMe();
                    } else if (response.status === 'not_authorized') {
                        alert("not logged in to app");
                    } else {
                        alert("not logged in to fb");
                    }
                });
            });
        }

        if($("#facebook-invite-js").length) {
            fb.init({
                appId: $("#facebook-invite-js").data("app-id")
            });
            fb.getLoginStatus(function(response) {
                if (response.status === "connected") {
                    fb.ui({method: "apprequests",
                        message: "Invite test",
                        to: $("#facebook-invite-js").data("user-id")
                    }, function(response){
                        console.log(response);
                    });
                }
                else {
                    fb.login();
                }
            });
        }

    });
});