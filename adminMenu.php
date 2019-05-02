<?php

require 'vendor/autoload.php';
use \Firebase\JWT\JWT;


function adminSettings() {
  add_options_page(
    'Frequent Visitor Coupons',
    'Frequent Visitor Coupons',
    'manage_options',
    'fvc-settings',
    'buildSettingsPage'
  );
};



function loadAdminScripts() {
  wp_register_style(
    'admin-style', 
    plugins_url('admin-style.css', __FILE__)
  );
  wp_enqueue_style('admin-style');
  wp_enqueue_script('jquery');
}
add_action('admin_enqueue_scripts', 'loadAdminScripts');



function buildSettingsPage() {
  require_once 'classes/AdminUtilities.php';


  // NEW COUPON FORM //
  require_once 'views/newCouponForm.php';
  
  
  // CURRENT COUPONS TABLE //
  // $targetData =
  AdminUtilities::loadTargets();
  
  require_once 'views/currentCoupons.php';
  
  
  
  
  
  
  /////////// TEST AREA FOR COOKIES ///////////////
  $key = "example_key";
  $token = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000
  );
  
  $jwt = JWT::encode($token, $key);
  $decoded = JWT::decode($jwt, $key, array('HS256'));
  
  var_dump($jwt);
  echo '=====$jwt=====';
  
  echo "{$jwt}";
  
  var_dump($decoded);
  echo '=====$decoded=====';
  
}

add_action('admin_menu', 'adminSettings', 1);
