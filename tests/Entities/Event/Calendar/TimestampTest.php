<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Timestamp;

class TimestampTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Timestamp
     */
    private $timestamp;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->timestamp = new Timestamp();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->timestamp = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
//        $this->timestamp->setTimeEnd(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->timestamp->getTimeEnd());

//        $this->timestamp->setTimeStart(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->timestamp->getTimeStart());
    }

    /**
     * Test Timestamp::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->timestamp::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
