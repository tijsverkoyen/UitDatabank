<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Location;

class LocationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Location
     */
    private $location;

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
        $this->location = new Location();
        $this->testHelper = new TestHelper();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->location = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $address = $this->testHelper->getEntitiesEventAddressObject();
        $this->location->setAddress($address);
        $this->assertEquals($address, $this->location->getAddress());

        $label = $this->testHelper->getEntitiesEventLocationLabelObject();
        $this->location->setLabel($label);
        $this->assertEquals($label, $this->location->getLabel());
    }

    /**
     * Test Location::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventLocationData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Location::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Location', $var);
    }
}
