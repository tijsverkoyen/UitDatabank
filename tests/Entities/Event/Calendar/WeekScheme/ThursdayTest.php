<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Thursday;

class ThursdayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Thursday
     */
    private $thursday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->thursday = new Thursday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->thursday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->thursday->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->thursday->getOpenType());
    }

    /**
     * Test Thursday::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->thursday::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
