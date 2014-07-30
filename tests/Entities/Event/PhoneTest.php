<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Phone;

class PhoneTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Phone
     */
    private $phone;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->phone = new Phone();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->phone = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->phone->setType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->phone->getType());

        $this->phone->setValue("this is just a test string");
        $this->assertEquals("this is just a test string", $this->phone->getValue());
    }

    /**
     * Test Phone::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->phone::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
