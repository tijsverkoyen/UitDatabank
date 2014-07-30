<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme;

class WeekSchemeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var WeekScheme
     */
    private $weekScheme;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->weekScheme = new WeekScheme();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->weekScheme = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
//        $this->weekScheme->setDays(/*array*/);
//        $this->assertEquals(/*array*/, $this->weekScheme->getDays());
    }

    /**
     * Test WeekScheme->addDay
     */
    public function testAddDay()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->weekScheme->addDay();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test WeekScheme::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->weekScheme::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
