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
        $this->twoLegged->setHttpMethod("GET");
        $this->assertEquals("GET", $this->twoLegged->getHttpMethod());

        $this->twoLegged->setNonce('nonce');
        $this->assertEquals('nonce', $this->twoLegged->getNonce());

        $var = array(
            'foo' => 'bar',
            'John' => 'Doe',
        );
        $this->twoLegged->setParameters($var);
        $this->assertEquals($var, $this->twoLegged->getParameters());

        $this->twoLegged->setSignatureMethod('HMAC-SHA1');
        $this->assertEquals('HMAC-SHA1', $this->twoLegged->getSignatureMethod());

        $this->twoLegged->setTimestamp(488122620);
        $this->assertEquals(488122620, $this->twoLegged->getTimestamp());

        $this->twoLegged->setUrl('http://example.com');
        $this->assertEquals('http://example.com', $this->twoLegged->getUrl());

        $this->twoLegged->setVersion('1.0');
        $this->assertEquals('1.0', $this->twoLegged->getVersion());

        $this->assertEquals('/FwKm6C3zBYwLFIHRBC9lVKvTag=', $this->twoLegged->getSignature());
        $this->assertEquals(
            'Authorization: OAuth realm="http://example.com",oauth_consumer_key="76163fc774cb42246d9de37cadeece8a",oauth_signature_method="HMAC-SHA1",oauth_timestamp="488122620",oauth_nonce="nonce",oauth_version="1.0",oauth_signature="%2FFwKm6C3zBYwLFIHRBC9lVKvTag%3D"',
            $this->twoLegged->getAuthorizationHeader()
        );
    }

    /**
     * Test TwoLegged->addParameter
     */
    public function testAddParameter()
    {
        $this->twoLegged->addParameter('key', 'value');
        $var = $this->twoLegged->getParameters();
        $this->assertArrayHasKey('key', $var);
        $this->assertEquals('value', $var['key']);
    }
}
