<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme;

class WeekSchemeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var WeekScheme
     */
    private $weekScheme;

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
        $this->weekScheme = new WeekScheme();
        $this->testHelper = new TestHelper();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->weekScheme = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $day = $this->testHelper->getEntitiesEventCalendarWeekSchemeDayObject();
        $this->weekScheme->setDays(array($day));
        $this->assertEquals(array($day), $this->weekScheme->getDays());
    }

    /**
     * Test WeekScheme->addDay
     */
    public function testAddDay()
    {
        $day = $this->testHelper->getEntitiesEventCalendarWeekSchemeDayObject();
        $this->weekScheme->setDays(array());
        $this->weekScheme->addDay($day);
        $this->assertEquals(array($day), $this->weekScheme->getDays());
    }

    /**
     * Test WeekScheme::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventCalendarWeekSchemeData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = WeekScheme::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme', $var);
    }
}
