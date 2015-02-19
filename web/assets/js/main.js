/////////////////////////////////////////////////////////////////////
var window = require("global/window");
var $ = require("jquery");
var videoYoutube = require("videojs-youtube");
var ga = require("ga-browserify");
require("toc");
require("bootstrap");

/////////////////////////////////////////////////////////////////////
$(function() {

    var tracker = ga("UA-55300212-1");
    $("#ga-test1").click(function() {
        tracker._trackPageview();
    });

    $("#ga-test2").click(function() {
        tracker._setCustomVar(1, "my var", "yes", 2);
        tracker._trackEvent("my cat", "my action", "my label");
    });

    $("#ga-test3").click(function() {
        tracker._setCustomVar(1, "my var", "no", 2);
        tracker._trackEvent("my cat", "my action", "my label");
    });

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
            FB.api("/me", function(response) {
                $("#me").html("<pre>"+JSON.stringify(response)+"</pre>");
            });
        }
        FB.init({
            appId : $("#facebook-connect-js").data("app-id")
        });

        FB.getLoginStatus(function(response) {
            $("#me").html("login in with cookie token");
            if (response.status === 'connected') {
                    //$("#FB-login").hide();
                    showMe();
                }
            });
        $("#fb-login").click(function() {
            FB.login(function(response) {
                if (response.status === "connected") {
                    console.log(response.authResponse.accessToken);
                    showMe();
                } else if (response.status === 'not_authorized') {
                    alert("not logged in to app");
                } else {
                    alert("not logged in to FB");
                }
            });
        });
    }

    if($("#facebook-invite-js").length) {
        FB.init({
            appId: $("#facebook-invite-js").data("app-id")
        });
        FB.getLoginStatus(function(response) {
            if (response.status === "connected") {
                FB.ui({method: "apprequests",
                    message: "Invite test",
                    to: $("#facebook-invite-js").data("user-id")
                }, function(response){
                    console.log(response);
                });
            }
            else {
                FB.login();
            }
        });
    }

});

/*


        if($("#facebook-connect-js").length) {
            function showMe() {
                FB.api("/me", function(response) {
                    $("#me").html("<pre>"+JSON.stringify(response)+"</pre>");
                });
            }
            FB.init({
                appId : $("#facebook-connect-js").data("app-id")
            });
            
            FB.getLoginStatus(function(response) {
                $("#me").html("login in with cookie token");
                if (response.status === 'connected') {
                    //$("#FB-login").hide();
                    showMe();
                }
            });
            $("#FB-login").click(function() {
                FB.login(function(response) {
                    if (response.status === "connected") {
                        console.log(response.authResponse.accessToken);
                        showMe();
                    } else if (response.status === 'not_authorized') {
                        alert("not logged in to app");
                    } else {
                        alert("not logged in to FB");
                    }
                });
            });
        }

        if($("#facebook-invite-js").length) {
            FB.init({
                appId: $("#facebook-invite-js").data("app-id")
            });
            FB.getLoginStatus(function(response) {
                if (response.status === "connected") {
                    FB.ui({method: "apprequests",
                        message: "Invite test",
                        to: $("#facebook-invite-js").data("user-id")
                    }, function(response){
                        console.log(response);
                    });
                }
                else {
                    FB.login();
                }
            });
        }

    });
});*/