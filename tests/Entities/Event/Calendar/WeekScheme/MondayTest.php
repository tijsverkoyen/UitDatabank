<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Monday;

class MondayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Monday
     */
    private $monday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->monday = new Monday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->monday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->monday->setOpenType('closed');
        $this->assertEquals('closed', $this->monday->getOpenType());
    }

    /**
     * Test Day::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventCalendarWeekSchemeDayData('monday');
        $xml = TestHelper::createXMLFromArray($data);

        $var = Monday::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Day', $var);
        $this->assertEquals($data['monday']['@attributes']['opentype'], $var->getOpenType());
    }
}
