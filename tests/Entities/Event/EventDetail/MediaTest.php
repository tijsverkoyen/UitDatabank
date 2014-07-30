<?php

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
        $this->media->setCopyright("this is just a test string");
        $this->assertEquals("this is just a test string", $this->media->getCopyright());

//        $this->media->setCreationDate(/*\DateTime*/);
//        $this->assertEquals(/*\DateTime*/, $this->media->getCreationDate());

        $this->media->setFileName("this is just a test string");
        $this->assertEquals("this is just a test string", $this->media->getFileName());

        $this->media->setFileType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->media->getFileType());

        $this->media->setHLink("this is just a test string");
        $this->assertEquals("this is just a test string", $this->media->getHLink());

        $this->media->setMain(true);
        $this->assertEquals(true, $this->media->getMain());

        $this->media->setMediaType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->media->getMediaType());

        $this->media->setPlainText("this is just a test string");
        $this->assertEquals("this is just a test string", $this->media->getPlainText());
    }

    /**
     * Test Media::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->media::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
