<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical;

class PhysicalTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Physical
     */
    private $physical;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->physical = new Physical();
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
        $this->physical->setCity("this is just a test string");
        $this->assertEquals("this is just a test string", $this->physical->getCity());

        $this->physical->setCountry("this is just a test string");
        $this->assertEquals("this is just a test string", $this->physical->getCountry());

//        $this->physical->setGis(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis*/, $this->physical->getGis());

        $this->physical->setHouseNr("this is just a test string");
        $this->assertEquals("this is just a test string", $this->physical->getHouseNr());

        $this->physical->setStreet("this is just a test string");
        $this->assertEquals("this is just a test string", $this->physical->getStreet());

        $this->physical->setZipcode("this is just a test string");
        $this->assertEquals("this is just a test string", $this->physical->getZipcode());
    }

    /**
     * Test Physical::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->physical::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
