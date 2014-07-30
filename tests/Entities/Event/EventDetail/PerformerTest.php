<?php

use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Performer;

class PerformerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Performer
     */
    private $performer;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->performer = new Performer();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->performer = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->performer->setLabel("this is just a test string");
        $this->assertEquals("this is just a test string", $this->performer->getLabel());

        $this->performer->setRole("this is just a test string");
        $this->assertEquals("this is just a test string", $this->performer->getRole());
    }

    /**
     * Test Performer::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->performer::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
