<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Tuesday;

class TuesdayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Tuesday
     */
    private $tuesday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->tuesday = new Tuesday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->tuesday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->tuesday->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->tuesday->getOpenType());
    }

    /**
     * Test Tuesday::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->tuesday::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
