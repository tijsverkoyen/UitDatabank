<?php

use TijsVerkoyen\UitDatabank\Entities\Event;

class EventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Event
     */
    private $event;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->event = new Event();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->event = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->event->setAgeFrom(42);
        $this->assertEquals(42, $this->event->getAgeFrom());

//        $this->event->setActivities(/*array*/);
//        $this->assertEquals(/*array*/, $this->event->getActivities());

//        $this->event->setAvailableTo(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->event->getAvailableTo());

//        $this->event->setAvailableFrom(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->event->getAvailableFrom());

//        $this->event->setBookingPeriod(/*\TijsVerkoyen\UitDatabank\Entities\Period*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Period*/, $this->event->getBookingPeriod());

//        $this->event->setCalendar(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Calendar*/, $this->event->getCalendar());

//        $this->event->setCategories(/*array*/);
//        $this->assertEquals(/*array*/, $this->event->getCategories());

        $this->event->setCdbId("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getCdbId());

        $this->event->setComments("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getComments());

//        $this->event->setContactInfo(/*\TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo*/, $this->event->getContactInfo());

        $this->event->setCreatedBy("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getCreatedBy());

//        $this->event->setCreationDate(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->event->getCreationDate());

//        $this->event->setEventDetails(/*array*/);
//        $this->assertEquals(/*array*/, $this->event->getEventDetails());

        $this->event->setExternalId("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getExternalId());

        $this->event->setIsParent(true);
        $this->assertEquals(true, $this->event->getIsParent());

        $this->event->setKeywords("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getKeywords());

//        $this->event->setLanguages(/*array*/);
//        $this->assertEquals(/*array*/, $this->event->getLanguages());

//        $this->event->setLastUpdated(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->event->getLastUpdated());

        $this->event->setLastUpdatedBy("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getLastUpdatedBy());

//        $this->event->setLocation(/*\TijsVerkoyen\UitDatabank\Entities\Event\Location*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Location*/, $this->event->getLocation());

//        $this->event->setOrganiser(/*\TijsVerkoyen\UitDatabank\Entities\Organiser*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Organiser*/, $this->event->getOrganiser());

        $this->event->setOwner("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getOwner());

        $this->event->setPercentageComplete(42);
        $this->assertEquals(42, $this->event->getPercentageComplete());

        $this->event->setPrivate(true);
        $this->assertEquals(true, $this->event->getPrivate());

        $this->event->setPublished(true);
        $this->assertEquals(true, $this->event->getPublished());

        $this->event->setValidator("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getValidator());

        $this->event->setWfStatus("this is just a test string");
        $this->assertEquals("this is just a test string", $this->event->getWfStatus());
    }

    /**
     * Test Event->addActivity
     */
    public function testAddActivity()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->event->addActivity();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Event->addCategory
     */
    public function testAddCategory()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->event->addCategory();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Event->addEventDetail
     */
    public function testAddEventDetail()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->event->addEventDetail();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Event->addLanguage
     */
    public function testAddLanguage()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->event->addLanguage();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test Event::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->event::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
