<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Performer;

class PerformerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Performer
     */
    private $performer;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->performer = new Performer();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->performer = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->performer->setLabel('Korneel De Rynck (historicus en auteur)');
        $this->assertEquals('Korneel De Rynck (historicus en auteur)', $this->performer->getLabel());

        $this->performer->setRole('begeleider');
        $this->assertEquals('begeleider', $this->performer->getRole());
    }

    /**
     * Test Performer::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventEventDetailPerformerData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Performer::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Performer', $var);
        $this->assertEquals($data['performer']['label'], $var->getLabel());
        $this->assertEquals($data['performer']['role'], $var->getRole());

    }

}
