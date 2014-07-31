<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Search\Result;

class ResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Result
     */
    private $result;

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
        $this->result = new Result();
        $this->testHelper = new TestHelper();
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
        $this->result->setNumResults(42);
        $this->assertEquals(42, $this->result->getNumResults());
    }

    /**
     * Test Result->addEvent
     */
    public function testAddEvent()
    {
        $event = $this->testHelper->getEntitiesEventObject();
        $this->result->addEvent($event);
        $this->assertEquals(array($event), $this->result->getEvents());
    }
}
