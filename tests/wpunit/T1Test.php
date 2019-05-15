<?php
require_once("../../vendor/autoload.php");
require_once ('../../classes/A/T1.php');

class T1Test extends \Codeception\TestCase\WPTestCase
{

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
    public function testMe()
    {
    }
    
    public function testAdd() {
      $t1 = new \T1();
      
      $this->assertEquals(1, 1);
      
      $sum = $t1->add(5, 2);
      $this->assertEquals(7, $sum, "didn't sum");
    }

}