<?php

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
        $this->price->setDescription("this is just a test string");
        $this->assertEquals("this is just a test string", $this->price->getDescription());

        $this->price->setValue(0.1337);
        $this->assertEquals(0.1337, $this->price->getValue());
    }

    /**
     * Test Price::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->price::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
