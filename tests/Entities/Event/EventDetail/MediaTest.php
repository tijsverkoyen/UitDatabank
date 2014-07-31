<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Media;

class MediaTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Media
     */
    private $media;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->media = new Media();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->media = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->media->setCopyright('Open Monumentendag: Erfgoed vroeger, nu en in de toekomst');
        $this->assertEquals('Open Monumentendag: Erfgoed vroeger, nu en in de toekomst', $this->media->getCopyright());

        $dateTime = new \DateTime();
        $this->media->setCreationDate($dateTime);
        $this->assertEquals($dateTime, $this->media->getCreationDate());

        $this->media->setFileName('4e6946f6-3b21-4ce9-b7fb-d554298767f1.jpg');
        $this->assertEquals('4e6946f6-3b21-4ce9-b7fb-d554298767f1.jpg', $this->media->getFileName());

        $this->media->setFileType('jpeg');
        $this->assertEquals('jpeg', $this->media->getFileType());

        $this->media->setHLink('//media.uitdatabank.be/20140723/4e6946f6-3b21-4ce9-b7fb-d554298767f1.jpg');
        $this->assertEquals('//media.uitdatabank.be/20140723/4e6946f6-3b21-4ce9-b7fb-d554298767f1.jpg', $this->media->getHLink());

        $this->media->setMain(true);
        $this->assertEquals(true, $this->media->getMain());

        $this->media->setMediaType('photo');
        $this->assertEquals('photo', $this->media->getMediaType());

        $this->media->setPlainText('this is just a test string');
        $this->assertEquals('this is just a test string', $this->media->getPlainText());
    }

    /**
     * Test Media::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventEventDetailMediaData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Media::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Media', $var);
        $this->assertEquals($data['file']['copyright'], $var->getCopyright());
        $this->assertEquals($data['file']['filename'], $var->getFileName());
        $this->assertEquals($data['file']['filetype'], $var->getFileType());
        $this->assertEquals($data['file']['hlink'], $var->getHLink());
        $this->assertEquals(($data['file']['@attributes']['main'] == 'true'), $var->getMain());
        $this->assertEquals($data['file']['mediatype'], $var->getMediaType());
    }
}
