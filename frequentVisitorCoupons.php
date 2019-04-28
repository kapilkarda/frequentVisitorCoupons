<?php
/*
Plugin Name: Frequent Visitor Coupons
Description: Give coupons to visitors who visit your site frequently, or even a specific product page!
*/



// hooks into admin-menu
require 'adminMenu.php';

// hooks into wp-footer
require 'frontEndRender.php';

require 'vendor/autoload.php';
// require_once 'classes/Utilities.php';


//////////////// ACTIVATION ////////////////////

register_activation_hook(__FILE__, 'Utilities::createTablesIfNotExists');





// handle the new coupon form

function uploadImage() {
  
  // tmp_name is file contents. name is file name
  $fileName = basename($_FILES['couponImage']['name']);
  
  // take the file named in the POST request and move it to './images'
  move_uploaded_file(
    $fileName,
    plugin_dir_path(__FILE__) . '/images/'
    );
  // path is user for internal usage (urls for external)
};

function selectCouponType() {
  // detect if there is an image being uploaded
  
  if ($_FILES['imageCoupon']) {
    return 'image';
  } else if ($_POST['textCouponTitleField']) {
    return 'text';
  } else {
    // error handling
    return ('issue in selectCouponType() function');
  }
};


function insertImageCoupon() {
  global $wpdb;
  
  
  $fileUrl = plugin_dir_url(__FILE__) . 'images/' . $_FILES['imageCoupon']['name'];

//  $insertedCoupon = $wpdb->insert(
//    "{$wpdb->prefix}frequentVisitorCoupons_coupon", [
//      'totalHits' => 0,
//      'isText' => false,
//      'imageUrl' =>  $fileUrl
//    ]
//  );
//
//  var_dump($insertedCoupon);
//  echo <<<'EOD'
//  =====$insertedCoupon=====
EOD;

};

function insertTextCoupon() {
  global $wpdb;
  
  $wpdb->insert("{$wpdb->prefix}frequentVisitorCoupons_coupon", [
    'totalHits' => 0,
    'isText' => true,
    'imageUrl' => null
  ]);
}


function addNewTarget() {
  // target insert query
};



function setupCouponTargetImageUpload() {
  // $_POST and $_FILE should be available
  
  $couponType = selectCouponType();
  var_dump($couponType);
  echo '=====$couponType=====';
  
  // upload the image URL if needed
  if($couponType === 'image') {
    insertImageCoupon();
  } else if ($couponType === 'text') {
    insertTextCoupon();
  }
  
  // addNewTarget(); // todo work on this next
  
//  wp_redirect('http://google.com'); // no redirect
//  exit;
}

add_action('admin_post_handleNewCoupon', 'setupCouponTargetImageUpload');


















