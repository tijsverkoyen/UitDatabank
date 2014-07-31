<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
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
        $this->sunday->setOpenType('closed');
        $this->assertEquals('closed', $this->sunday->getOpenType());
    }

    /**
     * Test Day::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventCalendarWeekSchemeDayData('sunday');
        $xml = TestHelper::createXMLFromArray($data);

        $var = Sunday::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Day', $var);
        $this->assertEquals($data['sunday']['@attributes']['opentype'], $var->getOpenType());
    }
}
