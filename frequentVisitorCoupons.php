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

function uploadImageAndGetDestination() {
  
  // tmp_name is file contents. name is file name
  $fileName = $_FILES['imageCoupon']['name'];
  $fileContents = $_FILES['imageCoupon']['tmp_name'];
  $destination = wp_upload_dir()['path'] . '/' . $fileName;
  
  // take the file named in the POST request and move it to './images'
  // path is for internal usage (urls for external)
  move_uploaded_file($fileContents, $destination);
  
  return $destination;
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


function insertImageCoupon(string $imagePath) {
  global $wpdb;
  
  // pull the filename and folder dates out of the string
  preg_match('/\/(\d\d\d\d\/\d\d)\/(.+)/', $imagePath, $pathMatchArray);
  
  // handle the case with the date folders, and without
  $firstItem = $pathMatchArray[1];
  // if first match is the date folders
  if (preg_match('/(\d\d\d\d/\d\d/)', $firstItem)) {
    // $dateFolders are present
    $matchedDateFolders = $firstItem;
    $fileName = $pathMatchArray[2];
  } else if (preg_match('/[a-zA-Z]+/', $firstItem)) {
    $matchedDateFolders = null;
    $fileName = $pathMatchArray[1];
  } else { return 'error on image path matching'; }
  
  
  // insert the new record
  $insertedCoupon = $wpdb->insert(
    "{$wpdb->prefix}frequentVisitorCoupons_coupon", [
      'totalHits' => 0,
      'isText' => false,
      'fileName' =>  $fileName,
      'folderDateString' => $matchedDateFolders
    ]
  );

  var_dump($insertedCoupon);
  echo <<<'EOD'
  =====$insertedCoupon=====
EOD;

};

function insertTextCoupon(array $fileInfo) {
  global $wpdb;
  
  $wpdb->insert("{$wpdb->prefix}frequentVisitorCoupons_coupon", [
    'totalHits' => 0,
    'isText' => true,
    'imageUrl' => null,
    '' // todo add the text fields from the form
  ]);
}



function addNewTarget() {
  // target insert query
};



function setupCouponTargetImageUpload() {
  // $_POST and $_FILE should be available
  
  $couponType = selectCouponType();
  
  // upload the image URL if needed
  if($couponType === 'image') {
    $imageInfo = uploadImageAndGetDestination();
    insertImageCoupon($imageInfo);
  } else if ($couponType === 'text') {
//    insertTextCoupon($textInfo); // todo write the insert
  }
  
  // addNewTarget(); // todo work on this next
  
//  wp_redirect('http://google.com'); // no redirect
//  exit;
}

add_action('admin_post_handleNewCoupon', 'setupCouponTargetImageUpload');


















