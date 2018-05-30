<?php

    $fullURL = 'http://localhost/MegamindProject';
    $header = 'libs/header.php';
    $footer = 'libs/footer.php';
    $assets = $fullURL.'/assets';
    $imgDir = $assets.'/img';
    $cssDir = $assets.'/css';
    $jsDir = $assets.'/js';
    $fontDir = $assets.'/font';
    $nav = 'libs/navBar.php';
    $shopBar = 'libs/shopBar.php';
    $detailShoes = 'libs/detailShoes.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dnName = "shop";
    $imgDirUpload =  '/MegamindProject/assets/img/shoes';

    session_start();

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dnName);
?>
