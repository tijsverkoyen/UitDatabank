<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis;

class GisTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Gis
     */
    private $gis;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->gis = new Gis();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->gis = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->gis->setXCoordinate(0.1337);
        $this->assertEquals(0.1337, $this->gis->getXCoordinate());

        $this->gis->setYCoordinate(0.1337);
        $this->assertEquals(0.1337, $this->gis->getYCoordinate());
    }

    /**
     * Test Gis::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->gis::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
