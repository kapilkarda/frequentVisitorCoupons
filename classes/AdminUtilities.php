<?php

class AdminUtilities {
  
  
  public static function sumSpecificPageViews(int $visitorId, string $currentUrl) {
    global $wpdb;
    
    // tally visits to this url by this user
    $viewCount = $wpdb->get_var("
      select count(visitorId) from {$wpdb->prefix}frequentVisitorCoupons_visits
        where visitorId === {$visitorId}
        and urlVisited === {$currentUrl}
    ");
    
    return $viewCount;
  }
  
//  public static function sumSitewidePageViews(int $visitorId) {
//
//  }
  
  ////// LOAD TARGET DATA FOR TARGETS TABLE //////
  public static function loadTargets() {
    global $wpdb;
    
    $query = $wpdb->get_results(
      "select * from {$wpdb->prefix}frequentVisitorCoupons_targets
        limit {$_POST['limit']}
        offset {$_POST['resultMarker']}
    ");

    return $query;
  }
  
  // for the database calls
  public static function queryDbForNewSelection() {
    require_once __DIR__ . '/../../classes/AdminUtilities.php';
  
    $targetData = self::loadTargets();
    wp_send_json($targetData);
  
    wp_die();
  }
  
  
  
  public static function loadInitialTargets() {
    global $wpdb;
    
    $targetData = $wpdb->get_results(
      "select * from {$wpdb->prefix}frequentVisitorCoupons_targets
        limit 10
    ");
    
    return $targetData;
  }
  
  
  public static function countCurrentTargets(bool $debug = false) {
    global $wpdb;
  
    $targetCount = $wpdb->get_var("select count(*) from {$wpdb->prefix}frequentVisitorCoupons_targets");
    
    if ($debug === true) {
      $targetCount = json_encode($targetCount);
      return $targetCount;
    } else {
      wp_send_json($targetCount);
    }
  }
  
}

