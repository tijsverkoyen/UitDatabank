<?php

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
        $this->label->setCdbid("this is just a test string");
        $this->assertEquals("this is just a test string", $this->label->getCdbid());

        $this->label->setValue("this is just a test string");
        $this->assertEquals("this is just a test string", $this->label->getValue());
    }

    /**
     * Test Label::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->label::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
