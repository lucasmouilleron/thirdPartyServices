<?php require_once "libs/tools.php" ?>
<!DOCTYPE html>
<head>

  <title>thirdPartyServices</title>
  <meta name="description" content="">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <link rel="shortcut icon" href="assets/img/favicon.png">
  <script src="assets/js/modernizr-2.6.2.min.js"></script>
        <!--[if lt IE 9]>
          <script src="assets/js/respond.min.js"></script>
          <![endif]-->
          <link rel="stylesheet" href="assets/css/main.css">

        </head>
        <body>

          <!-- /////////////////////////////////////////////////////////////// -->
          <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index">thirdPartyServices</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="<?php if(isPage("guidelines")) echo "active"?>"><a href="guidelines">Guidelines and tips</a></li>
                  <li class="<?php if(isPage("instagram")) echo "active"?>"><a href="instagram">Instagram</a></li>
                  <li class="<?php if(isPage("youtube")) echo "active"?>"><a href="youtube">Youtube</a></li>
                </ul>
              </div>
            </div>
          </div>

          <!-- /////////////////////////////////////////////////////////////// -->
          <div class="container">