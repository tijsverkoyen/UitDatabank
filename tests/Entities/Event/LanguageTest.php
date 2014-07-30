<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Language;

class LanguageTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Language
     */
    private $language;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->language = new Language();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->language = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->language->setType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->language->getType());

        $this->language->setValue("this is just a test string");
        $this->assertEquals("this is just a test string", $this->language->getValue());
    }

    /**
     * Test Language::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->language::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
