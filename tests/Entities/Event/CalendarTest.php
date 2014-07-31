<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar;

class CalendarTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var TestHelper
     */
    private $testHelper;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->calendar = new Calendar();
        $this->testHelper = new TestHelper();
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
        $periods = array(
            $this->testHelper->getEntitiesEventCalendarPeriodObject(),
        );

        $this->calendar->setPeriods($periods);
        $this->assertEquals($periods, $this->calendar->getPeriods());

        $permanent = $this->testHelper->getEntitiesEventCalendarPermanentObject();
        $this->calendar->setPermanentOpeningTimes($permanent);
        $this->assertEquals($permanent, $this->calendar->getPermanentOpeningTimes());

        $timestamps = array(
            $this->testHelper->getEntitiesEventCalendarTimestampObject(),
        );
        $this->calendar->setTimestamps($timestamps);
        $this->assertEquals($timestamps, $this->calendar->getTimestamps());
    }

    /**
     * Test Calendar->addPeriod
     */
    public function testAddPeriod()
    {
        $period = $this->testHelper->getEntitiesEventCalendarPeriodObject();
        $this->calendar->setPeriods(array());
        $this->calendar->addPeriod($period);
        $this->assertEquals(array($period), $this->calendar->getPeriods());
    }

    /**
     * Test Calendar->addTimestamp
     */
    public function testAddTimestamp()
    {
        $timestamp = $this->testHelper->getEntitiesEventCalendarTimestampObject();
        $this->calendar->setTimestamps(array());
        $this->calendar->addTimestamp($timestamp);
        $this->assertEquals(array($timestamp), $this->calendar->getTimestamps());
    }

    /**
     * Test Calendar::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventCalendarData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Calendar::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar', $var);
    }
}
