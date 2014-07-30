<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Friday;

class FridayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Friday
     */
    private $friday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->friday = new Friday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->friday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->friday->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->friday->getOpenType());
    }

    /**
     * Test Friday::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->friday::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
