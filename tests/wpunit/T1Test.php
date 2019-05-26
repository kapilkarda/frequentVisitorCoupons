<?php
 require_once(PLUGIN_FOLDER . "/vendor/autoload.php");
// require_once('./../../classes/A/T1.php');
require_once(PLUGIN_CLASSES . '/A/T1.php');


//class T1 {
//
//  public function add($a, $b) {
//    $x = $a + $b;
//    codecept_debug('data from target');
//    codecept_debug($x);
//
//    $y = get_home_path();
//    codecept_debug($y);
//    codecept_debug('=====$y=====');
//
//    return $x;
//  }
//}

class T1Test extends \Codeception\TestCase\WPTestCase {
  
    public function setUp()
    {
        // before
        parent::setUp();

        // your set up methods here
    }

    public function tearDown()
    {
        // your tear down methods here

        // then
        parent::tearDown();
    }

    // tests
    public function testAdd() {
      $t1 = new \T1();
      
      $this->assertEquals(1, 1);
      
      $sum = $t1->add(5, 2);
      $this->assertEquals(7, $sum);
    }

}