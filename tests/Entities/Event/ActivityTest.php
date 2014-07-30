<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Activity;

class ActivityTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Activity
     */
    private $activity;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->activity = new Activity();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->activity = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->activity->setCount(42);
        $this->assertEquals(42, $this->activity->getCount());

        $this->activity->setType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->activity->getType());
    }

    /**
     * Test Activity::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->activity::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
