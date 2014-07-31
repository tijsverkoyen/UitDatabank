<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Wednesday;

class WednesdayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Wednesday
     */
    private $wednesday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->wednesday = new Wednesday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->wednesday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->wednesday->setOpenType('closed');
        $this->assertEquals('closed', $this->wednesday->getOpenType());
    }

    /**
     * Test Day::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventCalendarWeekSchemeDayData('wednesday');
        $xml = TestHelper::createXMLFromArray($data);

        $var = Wednesday::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Day', $var);
        $this->assertEquals($data['wednesday']['@attributes']['opentype'], $var->getOpenType());
    }
}
