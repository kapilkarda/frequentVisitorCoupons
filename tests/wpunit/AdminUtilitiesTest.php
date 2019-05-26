<?php

require_once (PLUGIN_CLASSES . '/AdminUtilities.php');
require_once (PLUGIN_CLASSES . '/Utilities.php');

class AdminUtilitiesTest extends \Codeception\TestCase\WPTestCase
{

    public function setUp() {
        // before
        parent::setUp();
        global $wpdb;

        // your set up methods here
      
      // create tables if not exists
      Utilities::testCreateTablesIfNotExists();
  
  
      // add dummy data
      Utilities::addDummyTargetData(15);
  
      // output the table to console
      $fullTargetsTableQuery = "select * from {$wpdb->prefix}frequentVisitorCoupons_targets";
      $targetTableData = $wpdb->get_results($fullTargetsTableQuery);
  
    }

    public function tearDown()
    {
        // your tear down methods here

        // then
        parent::tearDown();
    }

    // tests
    public function testCountCurrentTargets() {
      $adminUtilites = new \AdminUtilities();
      
      $totalCount = $adminUtilites->countCurrentTargets(true);
  
      $this->assertEquals('"15"', $totalCount);
      
    }

}