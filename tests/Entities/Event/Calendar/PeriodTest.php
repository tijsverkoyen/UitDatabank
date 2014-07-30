<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Period;

class PeriodTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Period
     */
    private $period;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->period = new Period();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->period = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
//        $this->period->setWeekScheme(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme*/, $this->period->getWeekScheme());

//        $this->period->setDateFrom(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->period->getDateFrom());

//        $this->period->setDateTo(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->period->getDateTo());
    }

    /**
     * Test Period::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->period::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
