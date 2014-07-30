<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Organiser;

class OrganiserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Organiser
     */
    private $organiser;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->organiser = new Organiser();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->organiser = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->organiser->setLabel("this is just a test string");
        $this->assertEquals("this is just a test string", $this->organiser->getLabel());
    }

    /**
     * Test Organiser::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->organiser::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
