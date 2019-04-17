<?php

class Utilities {
  public function createTablesIfNotExists() {
    global $wpdb;
  
    $createCouponTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_coupons (
    couponId mediumint not null auto_increment unique,
    primary key (couponId),
    totalHits mediumint not null,
    isText boolean not null,
    imageUrl text(1000),
    fk_targets_coupons mediumint not null unique,
    foreign key fk_targets_coupons references wp_frequentVisitorCoupons_targets(targetId) on delete cascade
    )";
  
    $createTargetTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_targets (
      targetId medium int not null auto_increment unique,
      primary key (targetId),
      isSitewide tinyint(1) not null,
      targetUrl varchar(500),
      displayThreshold tinyint(5) not null default 20,
      offerCutoff tinyint(5)
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
    
    
    
    
    
    
    
    
  }
  
  
  
  
  
  
  
  
  
  
}