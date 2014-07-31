<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo;

class ContactInfoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ContactInfo
     */
    private $contactInfo;

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
        $this->contactInfo = new ContactInfo();
        $this->testHelper = new TestHelper();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->contactInfo = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $address = $this->testHelper->getEntitiesEventAddressObject();
        $this->contactInfo->setAddress($address);
        $this->assertEquals($address, $this->contactInfo->getAddress());

        $mail = $this->testHelper->getEntitiesEventMailObject();
        $this->contactInfo->setMail($mail);
        $this->assertEquals($mail, $this->contactInfo->getMail());

        $phone = $this->testHelper->getEntitiesEventPhoneObject();
        $this->contactInfo->setPhone($phone);
        $this->assertEquals($phone, $this->contactInfo->getPhone());

        $this->contactInfo->setUrl(
            'http://www.west-vlaanderen.be/kwaliteit/Leefomgeving/raversijde/Pages/default.aspx'
        );
        $this->assertEquals(
            'http://www.west-vlaanderen.be/kwaliteit/Leefomgeving/raversijde/Pages/default.aspx',
            $this->contactInfo->getUrl()
        );
    }

    /**
     * Test ContactInfo::createFromXML
     */
    public function testCreateFromXML()
    {
        $data = $this->testHelper->getEntitiesEventContactInfoData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = ContactInfo::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo', $var);
    }
}
