<?php
/*
Plugin Name: Frequent Visitor Coupons
Description: Give coupons to visitors who visit your site frequently, or even a specific product page!
*/



require 'adminMenu.php';

require 'frontEndRender.php';


function displayFloatingCoupon() {
  
  $textHeadline = 'On the fence? Get 10% off!';
  $textDescription = 'You\'ve checked out this product quite a bit! If you buy today we\'ll give you another 10% off. Use coupon code OffTheFence to get 10% off today only';
  $headlineTextColor = 'black';
  $headlineBgColor = 'white';
  $descriptionTextColor = 'white';
  $descriptionBgColor = 'purple';
  
  
  $imageUrl = 'puppetmaster.jpg';
  
  
//  require 'views/frontEndImageCoupon.php';
  require 'views/frontEndTextCoupon.php';
}

add_action('wp_footer', 'displayFloatingCoupon');
























