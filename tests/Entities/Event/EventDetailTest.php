<?php

use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail;

class EventDetailTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var EventDetail
     */
    private $eventDetail;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->eventDetail = new EventDetail();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->eventDetail = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->eventDetail->setCalendarSummary("this is just a test string");
        $this->assertEquals("this is just a test string", $this->eventDetail->getCalendarSummary());

        $this->eventDetail->setLang("this is just a test string");
        $this->assertEquals("this is just a test string", $this->eventDetail->getLang());

//        $this->eventDetail->setMedia(/*array*/);
//        $this->assertEquals(/*array*/, $this->eventDetail->getMedia());

//        $this->eventDetail->setPerformers(/*array*/);
//        $this->assertEquals(/*array*/, $this->eventDetail->getPerformers());

//        $this->eventDetail->setPrice(/*\TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price*/, $this->eventDetail->getPrice());

        $this->eventDetail->setShortDescription("this is just a test string");
        $this->assertEquals("this is just a test string", $this->eventDetail->getShortDescription());

//        $this->eventDetail->setLongDescription(/*mixed*/);
//        $this->assertEquals(/*mixed*/, $this->eventDetail->getLongDescription());

        $this->eventDetail->setTitle("this is just a test string");
        $this->assertEquals("this is just a test string", $this->eventDetail->getTitle());
    }

    /**
     * Test EventDetail->addMedia
     */
    public function testAddMedia()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->eventDetail->addMedia();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test EventDetail->addPerformer
     */
    public function testAddPerformer()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->eventDetail->addPerformer();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test EventDetail::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->eventDetail::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
