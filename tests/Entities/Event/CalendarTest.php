<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar;

class CalendarTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->calendar = new Calendar();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->calendar = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
//        $this->calendar->setPeriods(/*array*/);
//        $this->assertEquals(/*array*/, $this->calendar->getPeriods());

//        $this->calendar->setPermanentOpeningTimes(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent*/, $this->calendar->getPermanentOpeningTimes());

//        $this->calendar->setTimestamps(/*array*/);
//        $this->assertEquals(/*array*/, $this->calendar->getTimestamps());
    }

    /**
     * Test Calendar->addPeriod
     */
    public function testAddPeriod()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->calendar->addPeriod();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Calendar->addTimestamp
     */
    public function testAddTimestamp()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->calendar->addTimestamp();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Calendar::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->calendar::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
