<?php

class Utilities {
  public static function createTablesIfNotExists() {
    global $wpdb;
  
    $dummyQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}testCreate (
    testId mediumint not null auto_increment unique,
    primary key (testId)
    )";
  
    $createCouponTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_coupons (
    couponId mediumint not null auto_increment unique,
    primary key (couponId),
    totalHits mediumint not null,
    isText boolean not null,
    imageUrl text(1000)
    )";
  
    $createTargetTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_targets (
      targetId mediumint not null auto_increment unique,
      primary key (targetId),
      isSitewide tinyint(1) not null,
      targetUrl varchar(500),
      displayThreshold tinyint(5) not null default 20,
      offerCutoff tinyint(5),
      fk_coupons_targets mediumint not null unique,
      foreign key (fk_coupons_targets) references {$wpdb->prefix}frequentVisitorCoupons_coupons(couponId) on delete cascade
    )";
    
    $createVisitsTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_visits (
      visitId mediumint(9) not null auto_increment unique,
      primary key (visitId),
      visitorId mediumint(9) not null,
      urlVisited varchar(500) not null
    )";
  
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($createCouponTableQuery);
    dbDelta($createTargetTableQuery);
    dbDelta($createVisitsTableQuery);
    dbDelta($dummyQuery);
    
  }
  
  
  
  
  
  
  
  
  
  
}