<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Tuesday;

class TuesdayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Tuesday
     */
    private $tuesday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->tuesday = new Tuesday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->tuesday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->tuesday->setOpenType('closed');
        $this->assertEquals('closed', $this->tuesday->getOpenType());
    }

    /**
     * Test Day::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventCalendarWeekSchemeDayData('tuesday');
        $xml = TestHelper::createXMLFromArray($data);

        $var = Tuesday::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Day', $var);
        $this->assertEquals($data['tuesday']['@attributes']['opentype'], $var->getOpenType());
    }
}
