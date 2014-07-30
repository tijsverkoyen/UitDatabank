<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Monday;

class MondayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Monday
     */
    private $monday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->monday = new Monday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->monday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->monday->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->monday->getOpenType());
    }

    /**
     * Test Monday::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->monday::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
