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
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->oAuth::calculateBaseString();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test OAuth::calculateHeader
     */
    public function testCalculateHeader()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->oAuth::calculateHeader();
//        $this->assertEquals('...', $var);
    }

    /**
     * Test OAuth::hmacsha1
     */
    public function testHmacsha1()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->oAuth::hmacsha1();
//        $this->assertEquals('...', $var);
    }

}
