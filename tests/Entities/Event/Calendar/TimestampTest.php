<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Timestamp;

class TimestampTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Timestamp
     */
    private $timestamp;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->timestamp = new Timestamp();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->timestamp = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $dateTime = new \DateTime();
        $this->timestamp->setTimeEnd($dateTime);
        $this->assertEquals($dateTime, $this->timestamp->getTimeEnd());

        $dateTime = new \DateTime();
        $this->timestamp->setTimeStart($dateTime);
        $this->assertEquals($dateTime, $this->timestamp->getTimeStart());
    }

    /**
     * Test Timestamp::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventCalendarTimestampData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Timestamp::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Timestamp', $var);
        $this->assertEquals(
            new \DateTime($data['timestamp']['date'] . ' ' . $data['timestamp']['timeend']),
            $var->getTimeEnd()
        );
        $this->assertEquals(
            new \DateTime($data['timestamp']['date'] . ' ' . $data['timestamp']['timestart']),
            $var->getTimeStart()
        );
    }
}
