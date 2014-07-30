<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent;

class PermanentTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Permanent
     */
    private $permanent;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->permanent = new Permanent();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->permanent = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
//        $this->permanent->setWeekScheme(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme*/, $this->permanent->getWeekScheme());
    }

    /**
     * Test Permanent::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->permanent::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
