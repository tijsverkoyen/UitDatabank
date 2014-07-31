<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Address;

class AddressTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Address
     */
    private $address;

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
        $this->address = new Address();
        $this->testHelper = new TestHelper();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->address = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $physical = $this->testHelper->getEntitiesEventAddressPhysicalObject();
        $this->address->setPhysical($physical);
        $this->assertEquals($physical, $this->address->getPhysical());
    }

    /**
     * Test Address::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventAddressData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Address::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Address', $var);
    }
}
