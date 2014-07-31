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
        $this->assertTrue(Common::convertStringToBoolean(1));
        $this->assertTrue(Common::convertStringToBoolean('true'));
        $this->assertTrue(Common::convertStringToBoolean('t'));

        $this->assertFalse(Common::convertStringToBoolean(0));
        $this->assertFalse(Common::convertStringToBoolean('false'));
        $this->assertFalse(Common::convertStringToBoolean('f'));
        $this->assertFalse(Common::convertStringToBoolean('qsdqs'));
    }

    /**
     * Test Common::convertStringToTimestamp
     */
    public function testConvertStringToTimestamp()
    {
        $dateTime = new \DateTime();
        $dateTime->setDate(1985, 06, 20);
        $dateTime->setTime(13, 37, 0);

        $this->assertEquals(
            $dateTime,
            Common::convertStringToTimestamp(
                $dateTime->format('d/m/Y H:i:S')
            )
        );
    }
}
