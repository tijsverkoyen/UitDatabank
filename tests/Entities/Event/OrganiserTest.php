<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Organiser;

class OrganiserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Organiser
     */
    private $organiser;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->organiser = new Organiser();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->organiser = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->organiser->setLabel('Koninklijke Oostendse Heem- en Geschiedkundige Kring De Plate');
        $this->assertEquals(
            'Koninklijke Oostendse Heem- en Geschiedkundige Kring De Plate',
            $this->organiser->getLabel()
        );
    }

    /**
     * Test Organiser::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventOrganiserData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Organiser::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Organiser', $var);
        $this->assertEquals($data['organiser']['label'], $var->getLabel());
    }
}
