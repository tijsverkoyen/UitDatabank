<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
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

        $this->activity->setType('like');
        $this->assertEquals('like', $this->activity->getType());
    }

    /**
     * Test Activity::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventActivityData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Activity::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Activity', $var);
        $this->assertEquals($data['activity']['@attributes']['count'], $var->getCount());
        $this->assertEquals($data['activity']['@attributes']['type'], $var->getType());
    }
}
