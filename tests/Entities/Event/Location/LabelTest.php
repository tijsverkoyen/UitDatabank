<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Location\Label;

class LabelTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Label
     */
    private $label;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->label = new Label();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->label = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->label->setCdbid('1d36a305-1e89-4cd2-97eb-bb8644bcc6af');
        $this->assertEquals('1d36a305-1e89-4cd2-97eb-bb8644bcc6af', $this->label->getCdbid());

        $this->label->setValue('CC de Grote Post');
        $this->assertEquals('CC de Grote Post', $this->label->getValue());
    }

    /**
     * Test Label::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventLocationLabelData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Label::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Location\Label', $var);
        $this->assertEquals($data['label']['@attributes']['cdbid'], $var->getCdbid());
        $this->assertEquals($data['label']['value'], $var->getValue());
    }
}
