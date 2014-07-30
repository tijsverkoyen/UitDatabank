<?php

use TijsVerkoyen\UitDatabank\Search\Result;

class ResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Result
     */
    private $result;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->result = new Result();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->result = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
//        $this->result->setEvents(/*array*/);
//        $this->assertEquals(/*array*/, $this->result->getEvents());

        $this->result->setNumResults(42);
        $this->assertEquals(42, $this->result->getNumResults());
    }

    /**
     * Test Result->addEvent
     */
    public function testAddEvent()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->result->addEvent();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Result::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->result::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
