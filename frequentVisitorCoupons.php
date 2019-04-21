<?php
/*
Plugin Name: Frequent Visitor Coupons
Description: Give coupons to visitors who visit your site frequently, or even a specific product page!
*/


add_action('admin_post_handleNewCoupon', 'setupCouponTargetImageUpload');




// handle the new coupon form

function uploadImage() {
  
  // tmp_name is file contents. name is file name
  $fileName = basename($_FILES['couponImage']['name']);
  var_dump($fileName);
  echo '=====$fileName=====';
  
  // take the file named in the POST request and move it to './images'
  move_uploaded_file(
    $fileName,
    plugin_dir_path(__FILE__) . '/images/'
    );
  // path is user for internal usage (urls for external)
};

function selectCouponType() {
  // detect if there is an image being uploaded
  if ($_POST['imageCoupon']) {
    return 'image';
  } else if ($_POST['textCouponTitleField']) {
    return 'text';
  } else {
    // error handling
    return print_r('issue in selectCouponType() function');
  }
};


function insertImageCoupon() {
  global $wpdb;
  $fileUrl = plugin_dir_url(__FILE__) . '/images/' . $_FILES['couponImage']['name'];
  
  $insertedCoupon = $wpdb->insert(
    "{$wpdb->prefix}frequentVisitorCoupons_coupon", [
      'totalHits' => 0,
      'isText' => false,
      'imageUrl' =>  $fileUrl
    ]
  );
  
  var_dump($insertedCoupon);
  echo '=====$insertedCoupon=====';
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
  
  echo 'Yay, it works!';
  exit;
  
  ?>
    <script>
      console.log(`=====test=====`); // doesn't log
    </script>
  <?php  

//  $couponType = selectCouponType();
//  var_dump($couponType);
//  echo '=====$couponType====='; // doesn't echo
  
  // upload the image URL if needed
//  if($couponType === 'image') {
//    insertImageCoupon();
//  } else if ($couponType === 'text') {
//    insertTextCoupon();
//  }
  
  // addNewTarget(); // todo work on this next
  
//  wp_redirect('http://google.com'); // no redirect
//  exit;
}




// Add at the top-level..
add_action( 'admin_post_test123', 'testActionHandler');



function testActionHandler () {
  echo 'Yay, it works!';
  
  var_dump($_REQUEST);
  echo '=====$_REQUEST=====';
  
  exit;
}





// hooks into admin-menu
require 'adminMenu.php';

// hooks into wp-footer
require 'frontEndRender.php';












