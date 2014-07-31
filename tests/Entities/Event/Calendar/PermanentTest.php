<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent;

class PermanentTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Permanent
     */
    private $permanent;

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
        $this->permanent = new Permanent();
        $this->testHelper = new TestHelper();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->permanent = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $weekScheme = $this->testHelper->getEntitiesEventCalendarWeekSchemeObject();
        $this->permanent->setWeekScheme($weekScheme);
        $this->assertEquals($weekScheme, $this->permanent->getWeekScheme());
    }

    /**
     * Test Permanent::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventCalendarPermanentData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Permanent::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent', $var);
    }
}
