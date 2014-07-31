<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price;

class PriceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Price
     */
    private $price;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->price = new Price();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->price = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->price->setDescription('this is just a test string');
        $this->assertEquals('this is just a test string', $this->price->getDescription());

        $this->price->setValue(0.1337);
        $this->assertEquals(0.1337, $this->price->getValue());
    }

    /**
     * Test Price::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventEventDetailPrice();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Price::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price', $var);
        $this->assertEquals($data['price']['pricedescription'], $var->getDescription());
        $this->assertEquals($data['price']['pricevalue'], $var->getValue());
    }
}
