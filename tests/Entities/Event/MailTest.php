<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
use TijsVerkoyen\UitDatabank\Entities\Event\Mail;

class MailTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Mail
     */
    private $mail;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->mail = new Mail();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->mail = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->mail->setType('main');
        $this->assertEquals('main', $this->mail->getType());

        $this->mail->setValue('stadsmuseum@oostende.be');
        $this->assertEquals('stadsmuseum@oostende.be', $this->mail->getValue());
    }

    /**
     * Test Mail::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventMailData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Mail::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Mail', $var);
        $this->assertEquals($data['mail']['value'], $var->getValue());
    }
}
