<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event;

class EventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Event
     */
    private $event;

    /**
     * @var TestHelper
     */
    private $testHelper;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->event = new Event();
        $this->testHelper = new TestHelper();
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

        $activities = array(
            $this->testHelper->getEntitiesEventActivityObject(),
        );
        $this->event->setActivities($activities);
        $this->assertEquals($activities, $this->event->getActivities());

        $dateTime = new \DateTime();
        $this->event->setAvailableTo($dateTime);
        $this->assertEquals($dateTime, $this->event->getAvailableTo());

        $dateTime = new \DateTime();
        $this->event->setAvailableFrom($dateTime);
        $this->assertEquals($dateTime, $this->event->getAvailableFrom());

        $period = $this->testHelper->getEntitiesEventCalendarPeriodObject();
        $this->event->setBookingPeriod($period);
        $this->assertEquals($period, $this->event->getBookingPeriod());

        $calendar = $this->testHelper->getEntitiesEventCalendarObject();
        $this->event->setCalendar($calendar);
        $this->assertEquals($calendar, $this->event->getCalendar());

        $categories = array(
            $this->testHelper->getEntitiesEventCategoryObject(),
        );
        $this->event->setCategories($categories);
        $this->assertEquals($categories, $this->event->getCategories());

        $this->event->setCdbId('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getCdbId());

        $this->event->setComments('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getComments());

        $contactInfo = $this->testHelper->getEntitiesEventContactInfoObject();
        $this->event->setContactInfo($contactInfo);
        $this->assertEquals($contactInfo, $this->event->getContactInfo());

        $this->event->setCreatedBy('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getCreatedBy());

        $dateTime = new \DateTime();
        $this->event->setCreationDate($dateTime);
        $this->assertEquals($dateTime, $this->event->getCreationDate());

        $eventDetails = array(
            $this->testHelper->getEntitiesEventEventDetailObject(),
        );
        $this->event->setEventDetails($eventDetails);
        $this->assertEquals($eventDetails, $this->event->getEventDetails());

        $this->event->setExternalId('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getExternalId());

        $this->event->setIsParent(true);
        $this->assertEquals(true, $this->event->getIsParent());

        $this->event->setKeywords('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getKeywords());

        $languages = array(
            $this->testHelper->getEntitiesEventLanguageObject(),
        );
        $this->event->setLanguages($languages);
        $this->assertEquals($languages, $this->event->getLanguages());

        $dateTime = new \DateTime();
        $this->event->setLastUpdated($dateTime);
        $this->assertEquals($dateTime, $this->event->getLastUpdated());

        $this->event->setLastUpdatedBy('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getLastUpdatedBy());

        $location = $this->testHelper->getEntitiesEventLocationObject();
        $this->event->setLocation($location);
        $this->assertEquals($location, $this->event->getLocation());

        $organiser = $this->testHelper->getEntitiesEventOrganiserObject();
        $this->event->setOrganiser($organiser);
        $this->assertEquals($organiser, $this->event->getOrganiser());

        $this->event->setOwner('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getOwner());

        $this->event->setPercentageComplete(42);
        $this->assertEquals(42, $this->event->getPercentageComplete());

        $this->event->setPrivate(true);
        $this->assertEquals(true, $this->event->getPrivate());

        $this->event->setPublished(true);
        $this->assertEquals(true, $this->event->getPublished());

        $this->event->setValidator('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getValidator());

        $this->event->setWfStatus('this is just a test string');
        $this->assertEquals('this is just a test string', $this->event->getWfStatus());
    }

    /**
     * Test Event->addActivity
     */
    public function testAddActivity()
    {
        $activity = $this->testHelper->getEntitiesEventActivityObject();
        $this->event->setActivities(array());
        $this->event->addActivity($activity);
        $this->assertEquals(array($activity), $this->event->getActivities());
    }

    /**
     * Test Event->addCategory
     */
    public function testAddCategory()
    {
        $category = $this->testHelper->getEntitiesEventCategoryObject();
        $this->event->setCategories(array());
        $this->event->addCategory($category);
        $this->assertEquals(array($category), $this->event->getCategories());
    }

    /**
     * Test Event->addEventDetail
     */
    public function testAddEventDetail()
    {
        $eventDetail = $this->testHelper->getEntitiesEventEventDetailObject();
        $this->event->setEventDetails(array());
        $this->event->addEventDetail($eventDetail);
        $this->assertEquals(array($eventDetail), $this->event->getEventDetails());
    }

    /**
     * Test Event->addLanguage
     */
    public function testAddLanguage()
    {
        $language = $this->testHelper->getEntitiesEventLanguageObject();
        $this->event->setLanguages(array());
        $this->event->addLanguage($language);
        $this->assertEquals(array($language), $this->event->getLanguages());
    }

    /**
     * Test Event::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Event::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event', $var);
    }
}
