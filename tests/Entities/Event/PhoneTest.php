<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
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
        $this->phone->setType('phone');
        $this->assertEquals('phone', $this->phone->getType());

        $this->phone->setValue('059 70 22 85');
        $this->assertEquals('059 70 22 85', $this->phone->getValue());
    }

    /**
     * Test Phone::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventPhoneData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Phone::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Phone', $var);
        $this->assertEquals($data['phone']['@attributes']['type'], $var->getType());
        $this->assertEquals($data['phone']['value'], $var->getValue());
    }
}
