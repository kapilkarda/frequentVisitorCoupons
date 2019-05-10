<?php

require __DIR__ . '/../../vendor/autoload.php';
use \Firebase\JWT\JWT;


function buildSettingsPage() {
  require_once __DIR__ . '/../../classes/AdminUtilities.php';


  ////// NEW COUPON FORM //////
  require_once 'NewCouponFormSection.php';
  
  
  // CURRENT COUPONS TABLE //
  $targetData = AdminUtilities::loadInitialTargets();

  require_once 'CurrentCouponListingSection.php';
  
  
  
  
  /////////// TEST AREA FOR COOKIES ///////////////
//  $key = "example_key";
//  $token = array(
//    "iss" => "http://example.org",
//    "aud" => "http://example.com",
//    "iat" => 1356999524,
//    "nbf" => 1357000000
//  );
//
//  $jwt = JWT::encode($token, $key);
//  $decoded = JWT::decode($jwt, $key, array('HS256'));
//
//  var_dump($jwt);
//  echo '=====$jwt=====';
//
//  echo "{$jwt}";
//
//  var_dump($decoded);
//  echo '=====$decoded=====';
  
}


///// REGISTRATION HOOKS AND HANDLERS //////
/// Must be in outer scope



function adminSettings() {
  add_options_page(
    'Frequent Visitor Coupons',
    'Frequent Visitor Coupons',
    'manage_options',
    'fvc-settings',
    'buildSettingsPage'
  );
};
add_action('admin_menu', 'adminSettings');


function loadAdminScripts() {
  wp_register_style(
    'admin-style',
    plugins_url('admin-style.css', __FILE__)
  );
  wp_enqueue_style('admin-style');
  wp_enqueue_script('jquery');
}
add_action('admin_enqueue_scripts', 'loadAdminScripts');


// for the database calls
function queryDbForNewSelection() {
  require_once __DIR__ . '/../../classes/AdminUtilities.php';
  
  $targetData = AdminUtilities::loadTargets();
  wp_send_json($targetData);

  wp_die();
}

add_action( 'wp_ajax_queryDbForNewSelection', "queryDbForNewSelection");
