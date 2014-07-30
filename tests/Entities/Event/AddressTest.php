<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Address;

class AddressTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Address
     */
    private $address;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->address = new Address();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->address = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
//        $this->address->setPhysical(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical*/);
//        $this->assertEquals(/*\TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical*/, $this->address->getPhysical());
    }

    /**
     * Test Address::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->address::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
