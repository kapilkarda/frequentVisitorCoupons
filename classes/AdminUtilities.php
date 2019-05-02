<?php

class AdminUtilities {
  
  public static function loadTargets() {
    global $wpdb;
    
    $targetData = $wpdb->get_results(
      "select * from {$wpdb->prefix}frequentVisitorCoupons_targets"
    );
    
    var_dump($targetData);
    echo <<<'EOD'
    =====$targetData=====
EOD;
    return $targetData;
  }
  
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
  
  public static function sumSitewidePageViews(int $visitorId) {
  
  }
  
}

