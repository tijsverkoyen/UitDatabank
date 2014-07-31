<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Thursday;

class ThursdayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Thursday
     */
    private $thursday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->thursday = new Thursday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->thursday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->thursday->setOpenType('closed');
        $this->assertEquals('closed', $this->thursday->getOpenType());
    }

    /**
     * Test Day::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventCalendarWeekSchemeDayData('thursday');
        $xml = TestHelper::createXMLFromArray($data);

        $var = Thursday::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Day', $var);
        $this->assertEquals($data['thursday']['@attributes']['opentype'], $var->getOpenType());
    }
}
