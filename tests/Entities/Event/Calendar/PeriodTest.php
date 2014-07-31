<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Period;

class PeriodTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Period
     */
    private $period;

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
        $this->period = new Period();
        $this->testHelper = new TestHelper();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->period = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $weekScheme = $this->testHelper->getEntitiesEventCalendarWeekSchemeObject();
        $this->period->setWeekScheme($weekScheme);
        $this->assertEquals($weekScheme, $this->period->getWeekScheme());

        $dateTime = new DateTime();
        $this->period->setDateFrom($dateTime);
        $this->assertEquals($dateTime, $this->period->getDateFrom());

        $this->period->setDateTo($dateTime);
        $this->assertEquals($dateTime, $this->period->getDateTo());
    }

    /**
     * Test Period::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventCalendarPeriodData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Period::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Period', $var);
    }
}
