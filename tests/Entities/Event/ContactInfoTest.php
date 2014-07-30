<?php

use TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo;

class ContactInfoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ContactInfo
     */
    private $contactInfo;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->contactInfo = new ContactInfo();
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
//        $this->contactInfo->setAddress(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address*/, $this->contactInfo->getAddress());

//        $this->contactInfo->setMail(/*\TijsVerkoyen\UitDatabank\Entities\Event\Mail*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Mail*/, $this->contactInfo->getMail());

//        $this->contactInfo->setPhone(/*\TijsVerkoyen\UitDatabank\Entities\Event\Phone*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Phone*/, $this->contactInfo->getPhone());

        $this->contactInfo->setUrl("this is just a test string");
        $this->assertEquals("this is just a test string", $this->contactInfo->getUrl());
    }

    /**
     * Test ContactInfo::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->contactInfo::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
