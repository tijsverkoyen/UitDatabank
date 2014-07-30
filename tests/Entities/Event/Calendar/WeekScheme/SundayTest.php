<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Sunday;

class SundayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Sunday
     */
    private $sunday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->sunday = new Sunday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->sunday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->sunday->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->sunday->getOpenType());
    }

    /**
     * Test Sunday::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->sunday::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
