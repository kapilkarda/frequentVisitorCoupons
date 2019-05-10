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
  
  public static function loadInitialTargets() {
    global $wpdb;
    
    $targetData = $wpdb->get_results(
      "select * from {$wpdb->prefix}frequentVisitorCoupons_targets
        limit 10
    ");
    
    return $targetData;
  }
  
}

