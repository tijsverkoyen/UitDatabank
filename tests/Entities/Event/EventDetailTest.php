<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail;

class EventDetailTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var EventDetail
     */
    private $eventDetail;

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
        $this->eventDetail = new EventDetail();
        $this->testHelper = new TestHelper();
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
        $this->eventDetail->setCalendarSummary('this is just a test string');
        $this->assertEquals('this is just a test string', $this->eventDetail->getCalendarSummary());

        $this->eventDetail->setLang('this is just a test string');
        $this->assertEquals('this is just a test string', $this->eventDetail->getLang());

        $media = $this->testHelper->getEntitiesEventEventDetailMediaObject();
        $this->eventDetail->setMedia($media);
        $this->assertEquals($media, $this->eventDetail->getMedia());

        $performers = array(
            $this->testHelper->getEntitiesEventEventDetailPerformerObject(),
        );
        $this->eventDetail->setPerformers($performers);
        $this->assertEquals($performers, $this->eventDetail->getPerformers());

        $price = $this->testHelper->getEntitiesEventEventDetailPriceObject();
        $this->eventDetail->setPrice($price);
        $this->assertEquals($price, $this->eventDetail->getPrice());

        $this->eventDetail->setShortDescription('this is just a test string');
        $this->assertEquals('this is just a test string', $this->eventDetail->getShortDescription());

        $this->eventDetail->setLongDescription('this is just a test string');
        $this->assertEquals('this is just a test string', $this->eventDetail->getLongDescription());

        $this->eventDetail->setTitle('this is just a test string');
        $this->assertEquals('this is just a test string', $this->eventDetail->getTitle());
    }

    /**
     * Test EventDetail->addMedia
     */
    public function testAddMedia()
    {
        $media = $this->testHelper->getEntitiesEventEventDetailMediaObject();
        $this->eventDetail->setMedia(array());
        $this->eventDetail->addMedia($media);
        $this->assertEquals(array($media), $this->eventDetail->getMedia());
    }

    /**
     * Test EventDetail->addPerformer
     */
    public function testAddPerformer()
    {
        $performer = $this->testHelper->getEntitiesEventEventDetailPerformerObject();
        $this->eventDetail->setPerformers(array());
        $this->eventDetail->addPerformer($performer);
        $this->assertEquals(array($performer), $this->eventDetail->getPerformers());
    }

    /**
     * Test EventDetail::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventEventDetailData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = EventDetail::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\EventDetail', $var);
    }
}
