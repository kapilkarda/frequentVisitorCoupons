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
  // key will be making first capture group optional, probably with .
  preg_match('/\/(\d\d\d\d\/\d\d)\/(.+)/', $imagePath, $pathMatchArray);
  $dateCaptureGroup = $pathMatchArray[1];
  $fileName = $pathMatchArray[2];
  
  // if no date match, capture the suffix into $fileName
  if ($dateCaptureGroup === '') {
    preg_match('/\/([^/]+)$/', $fileName);
  }
  
  if (preg_match('/(\d\d\d\d\/\d\d)/', $dateCaptureGroup)) {
    // $dateFolders are present
    $matchedDateFoldersOrNull = $dateCaptureGroup;
  } else {
    $matchedDateFoldersOrNull = null;
  }
  
  // insert the new record
  $wpdb->insert(
    "{$wpdb->prefix}frequentVisitorCoupons_coupons", [
      'totalHits' => 0,
      'isText' => 0,
      'fileName' =>  $fileName,
      'folderDateString' => $matchedDateFoldersOrNull
    ]
  );
  
  $couponId = $wpdb->insert_id;
  return $couponId;
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

function insertTarget($couponId) {
  global $wpdb;
  
  $isSitewide = $_POST['trackingScope'] === 'wholeSite' ? 1 : 0;
  
  $wpdb->insert(
    "{$wpdb->prefix}frequentVisitorCoupons_targets", [
      'isSitewide' => $isSitewide,
      'displayThreshold' => $_POST['hitsBeforeShowing'],
      'offerCutoff' => $_POST['numberOfOffers'],
      'fk_coupons_targets' => $couponId,
    ]
  );

  $queryResult = $wpdb->query("select * from {$wpdb->prefix}frequentVisitorCoupons_targets");
  
  var_dump($queryResult);
  echo <<<'EOD'
  =====$queryResult=====
EOD;
};


function addNewTarget() {
  // target insert query
};



function setupCouponTargetImageUpload() {
  // $_POST and $_FILE should be available
  
  $couponType = selectCouponType();
  
  // upload the image URL if needed
  if($couponType === 'image') {
    $imageInfo = uploadImageAndGetDestination();
    $couponId = insertImageCoupon($imageInfo);
    insertTarget($couponId);
  } else if ($couponType === 'text') {
//    insertTextCoupon($textInfo); // todo write the insert
  }
  
  // addNewTarget(); // todo work on this next
  
//  wp_redirect('http://google.com'); // no redirect
//  exit;
}

add_action('admin_post_handleNewCoupon', 'setupCouponTargetImageUpload');


















