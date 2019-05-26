<?php

require PLUGIN_FOLDER . '/vendor/autoload.php';
use \Firebase\JWT\JWT;




//////// SETTINGS PAGE BUILDING ///////

function buildSettingsPage() {
  require_once PLUGIN_CLASSES . '/AdminUtilities.php';


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



////// SCRIPT LOADING //////

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
    plugins_url('admin-style.css', __FILE__
      )
  );
  wp_enqueue_style('admin-style');
  
  wp_enqueue_script('CurrentCouponListingSection', plugin_dir_url(__FILE__) . 'CurrentCouponListingSection.js',
    ['jquery', 'underscore']
    );
  }
add_action('admin_enqueue_scripts', 'loadAdminScripts');







/////// ACTIONS FROM CHILD FILES /////////

add_action( 'wp_ajax_queryDbForNewSelection', "AdminUtilities::queryDbForNewSelection");

add_action('wp_ajax_callForCountOfTargets', 'AdminUtilities::countCurrentTargets');

