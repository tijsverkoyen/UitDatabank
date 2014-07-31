<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
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
        $this->language->setType('spoken');
        $this->assertEquals('spoken', $this->language->getType());

        $this->language->setValue('Nederlands');
        $this->assertEquals('Nederlands', $this->language->getValue());
    }

    /**
     * Test Language::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventLanguageData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Language::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Language', $var);
        $this->assertEquals($data['language']['@attributes']['type'], $var->getType());
        $this->assertEquals($data['language']['value'], $var->getValue());
    }

}
