<?php

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
        $this->mail->setType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->mail->getType());

        $this->mail->setValue("this is just a test string");
        $this->assertEquals("this is just a test string", $this->mail->getValue());
    }

    /**
     * Test Mail::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->mail::createFromXML();
//        $this->assertEquals('...', $var);
    }

}
