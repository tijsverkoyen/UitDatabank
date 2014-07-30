<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Location;

class LocationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Location
     */
    private $location;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->location = new Location();
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
//        $this->location->setAddress(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address*/, $this->location->getAddress());

//        $this->location->setLabel(/*\TijsVerkoyen\UitDatabank\Entities\Event\Label*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Label*/, $this->location->getLabel());
    }

    /**
     * Test Location::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->location::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
