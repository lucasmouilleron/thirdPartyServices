<?php require_once __DIR__."/../libs/tools.php" ?>
<!DOCTYPE html>
<head>

  <title>thirdPartyServices</title>
  <meta name="description" content="">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo BASE_URL?>/assets/img/favicon.png">
  <link rel="stylesheet" href="<?php echo BASE_URL?>/assets/css/main.css">

</head>
<body>

  <!-- /////////////////////////////////////////////////////////////// -->
  <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5D9MC3"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5D9MC3');</script>
  <!-- End Google Tag Manager -->

  <!-- /////////////////////////////////////////////////////////////// -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo BASE_URL?>">thirdPartyServices</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="<?php if(isPage("guidelines")) echo "active"?>"><a href="<?php echo BASE_URL?>/guidelines">Guidelines and tips</a></li>
          <li class="<?php if(isPage("facebook")) echo "active"?>"><a href="<?php echo BASE_URL?>/tests/facebook">Facebook</a></li>
          <li class="<?php if(isPage("twitter")) echo "active"?>"><a href="<?php echo BASE_URL?>/tests/twitter">Twitter</a></li>
          <li class="<?php if(isPage("instagram")) echo "active"?>"><a href="<?php echo BASE_URL?>/tests/instagram">Instagram</a></li>
          <li class="<?php if(isPage("youtube")) echo "active"?>"><a href="<?php echo BASE_URL?>/tests/youtube">Youtube</a></li>
          <li class="<?php if(isPage("google-analytics")) echo "active"?>"><a href="<?php echo BASE_URL?>/tests/google-analytics">Google Analytics</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- /////////////////////////////////////////////////////////////// -->
  <div class="container">