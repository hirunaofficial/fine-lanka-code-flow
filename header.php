<?php

include 'config/config.php';

$select = "SELECT username FROM places";


$httpip = $_SERVER['HTTP_CLIENT_IP'] 
   ? $_SERVER['HTTP_CLIENT_IP'] 
   : ($_SERVER['HTTP_X_FORWARDED_FOR'] 
        ? $_SERVER['HTTP_X_FORWARDED_FOR'] 
        : $_SERVER['REMOTE_ADDR']);
		
$urlstats = file_get_contents("http://ip-api.com/json/$httpip");
$ipdecode = json_decode($urlstats);
$country = $ipdecode->country;
$province = $ipdecode->regionName;
$city = $ipdecode->city;

?>

<!doctype html>
<html lang="en">
   <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="data/vendors/bootstrap/css/bootstrap.min.css" media="all">
      <link rel="stylesheet" type="text/css" href="data/vendors/fontawesome/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="data/vendors/jquery-ui/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="data/vendors/modal-video/modal-video.min.css">
      <link rel="stylesheet" type="text/css" href="data/vendors/lightbox/dist/css/lightbox.min.css">
      <link rel="stylesheet" type="text/css" href="data/vendors/slick/slick.css">
      <link rel="stylesheet" type="text/css" href="data/vendors/slick/slick-theme.css">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="data/css/style.css">
      <title><?php echo $title; ?> - FindLanka</title>
   </head>
   <body class="home">
      <?php if(!isset($loder_switch)){ ?>
      <div id="siteLoader" class="site-loader">
         <div class="preloader-content">
            <img src="data/images/loader.gif" alt="">
         </div>
      </div>
      <?php } ?>
      <div id="page" class="full-page">
         <header id="masthead" class="site-header header-primary">
           
            <div class="bottom-header">
               <div class="container d-flex justify-content-between align-items-center">
                  <div class="site-identity">
                     <h1 class="site-title">
                        <a href="index.php" class="text-light">
                           FindLanka
                        </a>
                     </h1>
                  </div>
                  <div class="main-navigation d-none d-lg-block">
                     <nav id="navigation" class="navigation">
                        <ul>
                           <li class=""><a href="index.php">Home</a></li>
                           <li class="menu-item-has-children">
                              <a href="#categories">categories</a>
                              <ul>
                                 <li>
                                    <a href="category.php?category=exploring">Exploring</a>
                                 </li>
                                 <li>
                                    <a href="category.php?category=religious">Religious</a>
                                 </li>
                                 <li>
                                    <a href="category.php?category=hiking">Hiking</a>
                                 </li>
                                 <li>
                                    <a href="category.php?category=surfing">Surfing</a>
                                 </li>
                                 
                              </ul>
                           </li>
						   <li class=""><a href="gallery.php">All places</a></li>
						   <li class=""><a href="tips.php">Travel Tips</a></li>
                        </ul>
                     </nav>
                  </div>
                  <div class="header-btn">
                     <a href="#location" class="button-primary"><?php echo $city; ?></a>
                  </div>
               </div>
            </div>
            <div class="mobile-menu-container"></div>
         </header>