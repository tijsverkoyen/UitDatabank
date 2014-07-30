<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Saturday;

class SaturdayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Saturday
     */
    private $saturday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->saturday = new Saturday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->saturday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->saturday->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->saturday->getOpenType());
    }

    /**
     * Test Saturday::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->saturday::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
