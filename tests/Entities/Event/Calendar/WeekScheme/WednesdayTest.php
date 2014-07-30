<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Wednesday;

class WednesdayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Wednesday
     */
    private $wednesday;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->wednesday = new Wednesday();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->wednesday = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->wednesday->setOpenType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->wednesday->getOpenType());
    }

    /**
     * Test Wednesday::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->wednesday::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
