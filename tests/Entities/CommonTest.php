<?php

use TijsVerkoyen\UitDatabank\Entities\Common;

class CommonTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Common
     */
    private $common;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->common = new Common();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->common = null;
        parent::tearDown();
    }

    /**
     * Test Common::convertStringToBoolean
     */
    public function testConvertStringToBoolean()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->common::convertStringToBoolean();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Common::convertStringToTimestamp
     */
    public function testConvertStringToTimestamp()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->common::convertStringToTimestamp();
//        $this->assertEquals('...', $var);
    }

}
