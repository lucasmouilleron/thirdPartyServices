/////////////////////////////////////////////////////////////////////
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
        tracker._setCustomVar(1, "Items Removed", "Yes", 2);
        tracker._trackEvent("my cat", "my action", "my label");
    });

    $("#ga-test3").click(function() {
        tracker._setCustomVar(1, "Items Removed", "Yes", 2);
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

/*


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
});*/