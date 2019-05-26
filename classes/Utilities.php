<?php

class Utilities {
  public static function createTablesIfNotExists() {
    global $wpdb;
  
    $createCouponTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_coupons (
    couponId mediumint not null auto_increment unique,
    primary key (couponId),
    totalHits mediumint not null,
    isText boolean not null,
    fileName varchar(200),
    folderDateString varchar(7)
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
    
  }
  
  
  public static function addDummyTargetData(int $numberOfRecords) {
    global $wpdb;
    $tableName = "{$wpdb->prefix}frequentVisitorCoupons_targets";
    
    for ($i = 0; $i < $numberOfRecords; $i++) {
      $isSitewideOptions = [true, false];
      $fakePage = self::createAlphaString(mt_rand(5, 10));
  
      $dataToInsert = [
        'isSitewide' => $isSitewideOptions[mt_rand(0, 1)],
        'displayThreshold' => mt_rand(3, 10),
        'targetUrl' => "domain.com/{$fakePage}",
        'offerCutoff' => mt_rand(1, 10),
        'fk_coupons_targets' => mt_rand(1, 16),
      ];
      
      $wpdb->insert($tableName, $dataToInsert);
    }
  }
  
  protected static function createAlphaString($numberOfChars) {
    $word = [];
    for ($i = 0; $i < $numberOfChars; $i++) {
      $letter = chr(rand(97,122));
      array_push($word, $letter);
    }
  
    $implodedWord = implode($word);
    
    return $implodedWord;
  }
  
  
  public static function deleteAllTargetData() {
   global $wpdb;
   $wpdb->query(
     "truncate table {$wpdb->prefix}frequentVisitorCoupons_targets"
   );
  }
  
  
  ////// TEST ONLY METHODS //////
  
  public static function testCreateTablesIfNotExists() {
    global $wpdb;
    
    $createCouponTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_coupons (
    couponId mediumint not null auto_increment unique,
    primary key (couponId),
    totalHits mediumint not null,
    isText boolean not null,
    fileName varchar(200),
    folderDateString varchar(7)
    )";
    
    $createTargetTableQuery = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}frequentVisitorCoupons_targets (
      targetId mediumint not null auto_increment unique,
      primary key (targetId),
      isSitewide tinyint(1) not null,
      targetUrl varchar(500),
      displayThreshold tinyint(5) not null default 20,
      offerCutoff tinyint(5),
      fk_coupons_targets mediumint not null
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