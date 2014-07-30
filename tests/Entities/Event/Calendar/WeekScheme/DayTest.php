<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Day;

class DayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Day
     */
    private $day;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->day = new Day();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->day = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->day->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->day->getOpenType());
    }

    /**
     * Test Day::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->day::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
