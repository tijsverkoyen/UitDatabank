<?php

use TijsVerkoyen\UitDatabank\OAuth\OAuth;

class OAuthTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var OAuth
     */
    private $oAuth;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->oAuth = new OAuth();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->oAuth = null;
        parent::tearDown();
    }

    /**
     * Test OAuth::calculateBaseString
     */
    public function testCalculateBaseString()
    {
        $var = oAuth::calculateBaseString(
            'http://example.com',
            'GET',
            array(
                'foo' => 'bar',
            )
        );
        $this->assertEquals('GET&http%3A%2F%2Fexample.com&foo%3Dbar', $var);

        $var = oAuth::calculateBaseString(
            'http://example.com',
            'GET'
        );
        $this->assertEquals('GET&http%3A%2F%2Fexample.com&', $var);
    }

    /**
     * Test OAuth::calculateHeader
     */
    public function testCalculateHeader()
    {
        $var = oAuth::calculateHeader(
            array(
                'foo' => 'bar'
            ),
            'http://example.com'
        );
        $this->assertEquals(
            'Authorization: OAuth realm="http://example.com", foo="bar"',
            $var
        );
    }

    /**
     * Test OAuth::hmacsha1
     */
    public function testHmacsha1()
    {
        $var = oAuth::hmacsha1('key', 'data');
        $this->assertEquals('EEFSxb/coHvGM+69RhmfAlXJ9J0=', $var);
    }
}
