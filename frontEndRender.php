<?php

require 'vendor/autoload.php';

// ALSO DONE IN ADMIN MENU... consolidate in a smart way
//function loadAdminScripts() {
  // register and enqueue the css file
//}
// add the enqueue action


function controlCouponRendering() {
  // call the determination function here. It should supply all the data if yes
  
  $data = [
    "url" => "http://localhost:3000",
    "coupon" => "" // do this now
  ];
  
}



function displayFloatingCoupon() {
  
  $textHeadline = 'On the fence? Get 10% off!';
  $textDescription = 'You\'ve checked out this product quite a bit! If you buy today we\'ll give you another 10% off. Use coupon code OffTheFence to get 10% off today only';
  $headlineTextColor = 'black';
  $headlineBgColor = 'white';
  $descriptionTextColor = 'white';
  $descriptionBgColor = 'purple';
  
  
  $imageUrl = 'puppetmaster.jpg';


//  require 'views/ImageCouponOverlay.php';
  require 'views/TextCouponOverlay.php';
}

add_action('wp_footer', 'displayFloatingCoupon');