<?php

use TijsVerkoyen\UitDatabank\OAuth\TwoLegged;

class TwoLeggedTest extends PHPUnit_Framework_TestCase
{
    private $config = array(
        'key' => '76163fc774cb42246d9de37cadeece8a',
        'secret' => 'fff975c5a8c7ba19ce92969c1879b211',
    );

    /**
     * @var TwoLegged
     */
    private $twoLegged;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->twoLegged = new TwoLegged(
            $this->config['key'],
            $this->config['secret']
        );
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->twoLegged = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->twoLegged->setHttpMethod("this is just a test string");
        $this->assertEquals("this is just a test string", $this->twoLegged->getHttpMethod());

//        $this->twoLegged->setNonce(/*mixed*/);
//        $this->assertEquals(/*mixed*/, $this->twoLegged->getNonce());

//        $this->twoLegged->setParameters(/*array*/);
//        $this->assertEquals(/*array*/, $this->twoLegged->getParameters());

        $this->twoLegged->setSignatureMethod("this is just a test string");
        $this->assertEquals("this is just a test string", $this->twoLegged->getSignatureMethod());

//        $this->twoLegged->setTimestamp(/*mixed*/);
//        $this->assertEquals(/*mixed*/, $this->twoLegged->getTimestamp());

//        $this->twoLegged->setUrl(/*mixed*/);
//        $this->assertEquals(/*mixed*/, $this->twoLegged->getUrl());

        $this->twoLegged->setVersion("this is just a test string");
        $this->assertEquals("this is just a test string", $this->twoLegged->getVersion());

//        $this->assertEquals(/*args*/, $this->twoLegged->getSignature();

//        $this->assertEquals(/*args*/, $this->twoLegged->getAuthorizationHeader();
    }

    /**
     * Test TwoLegged->addParameter
     */
    public function testAddParameter()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->twoLegged->addParameter();
//        $this->assertEquals('...', $var);
    }

}
