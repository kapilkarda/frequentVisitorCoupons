<?php
/*
Plugin Name: Frequent Visitor Coupons
Description: Give coupons to visitors who visit your site frequently, or even a specific product page!
*/



require 'adminMenu.php';

require 'frontEndRender.php';


function displayFloatingCoupon() {
  
  $textHeadline = 'On the fence? Get 10% off!';
  $textDescription = 'You\'ve checked out this product quite a bit! If you buy today we\'ll give you another 10% off. Use coupon code OffTheFence to get 10% off today only' ;
  $headlineTextColor = 'black';
  $headlineBgColor = 'white';
  $descriptionTextColor = 'white';
  $descriptionBgColor = 'purple';
  
  $imageFolder = plugin_dir_url(__FILE__);
  $fullUrl = $imageFolder . '/images/puppetmaster.jpg';
  
  echo "
    <!-- for text coupons -->
    <style>
      #headline {
        max-width: 100vw;
        padding: 5px 5px;
        margin: 0;
        text-align: center;
        color: {$headlineTextColor};
        background-color: {$headlineBgColor};
      }
      
      #description {
        max-width: 100vw;
        padding: 20px 5px;
        margin: 0;
        text-align: center;
        color: {$descriptionTextColor};
        background-color: {$descriptionBgColor};
      }
      
      #textCoupon {
        position: fixed;
        bottom: 70px;
        right: 10px;
        border: 3px dashed black;
      }
      
      @media (min-width: 700px) {
        #headline, #description {
          max-width: 500px;
        }
      }
      @media (min-width: 750px) {
        #textCoupon {
          bottom: 10px;
        }
      }
    </style>
    
    <div id='textCoupon'>
      <h2 id='headline'>{$textHeadline}</h2>
      <p id='description'>{$textDescription}</p>
    </div>

    ";
}



//     for image coupons
//    <style>
//      #couponImage {
//        position: fixed;
//        bottom: 50px;
//        right: 5px;
//        border: 2px dashed yellow;
//      }
//    </style>
//
//    <img
//      src={$fullUrl}
//      alt='Special Coupon Offer 3'
//      id='couponImage'
//    />

add_action('wp_footer', 'displayFloatingCoupon');




















