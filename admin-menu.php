<?php


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
}
add_action('admin_enqueue_scripts', 'loadAdminScripts');



function buildSettingsPage() {
  require 'views/newCouponForm.php';
}

add_action('admin_menu', 'adminSettings', 1);
