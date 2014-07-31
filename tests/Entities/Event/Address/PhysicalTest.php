<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical;

class PhysicalTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Physical
     */
    private $physical;

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
        $this->physical = new Physical();
        $this->testHelper = new TestHelper();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->physical = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->physical->setCity('Oostende');
        $this->assertEquals('Oostende', $this->physical->getCity());

        $this->physical->setCountry('BE');
        $this->assertEquals('BE', $this->physical->getCountry());

        $gis = $this->testHelper->getEntitiesEventAddressGisObject();
        $this->physical->setGis($gis);
        $this->assertEquals($gis, $this->physical->getGis());

        $this->physical->setHouseNr('636');
        $this->assertEquals('636', $this->physical->getHouseNr());

        $this->physical->setStreet('Nieuwpoortsesteenweg');
        $this->assertEquals('Nieuwpoortsesteenweg', $this->physical->getStreet());

        $this->physical->setZipcode('8400');
        $this->assertEquals('8400', $this->physical->getZipcode());
    }

    /**
     * Test Physical::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventAddressPhysicalData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Physical::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical', $var);
        $this->assertEquals($data['physical']['city'], $var->getCity());
        $this->assertEquals($data['physical']['country'], $var->getCountry());
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis', $var->getGis());
        $this->assertEquals($data['physical']['housenr'], $var->getHouseNr());
        $this->assertEquals($data['physical']['street'], $var->getStreet());
        $this->assertEquals($data['physical']['zipcode'], $var->getZipcode());
    }
}
