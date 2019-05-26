<?php
namespace admin;

require_once (PLUGIN_FOLDER . '/views/admin/adminMenuContainer.php');



class adminMenuContainerTest extends \Codeception\TestCase\WPTestCase
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
    public function testCountCurrentTargets() {
    
    }

}