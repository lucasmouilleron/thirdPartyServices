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
        "videoYoutube" : "vendor/video-youtube"
    },
    // dependencies and exports
    shim: {
        "bootstrap": ["jquery"],
        "throbber": ["jquery"],
        "console": ["jquery"],
        "tools": ["jquery"],
        "toc": ["jquery"],
        "videoYoutube": ["video"]
    }
});

/////////////////////////////////////////////////////////////////////
// BOOTSRAP !!!!
/////////////////////////////////////////////////////////////////////
require(["jquery", "videoYoutube", "bootstrap", "console", "tools","toc"], function($,videoYoutube) {
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
            videojs("video", { 
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
        
    });
});