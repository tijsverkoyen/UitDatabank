<?php

use TijsVerkoyen\UitDatabank\UitDatabank;

class UitDatabankTest extends PHPUnit_Framework_TestCase
{
    private $config = array(
        'key' => '76163fc774cb42246d9de37cadeece8a',
        'secret' => 'fff975c5a8c7ba19ce92969c1879b211',
        'server' => 'http://acc.uitid.be/uitid/rest',
    );

    /**
     * @var UitDatabank
     */
    private $uitDatabank;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->uitDatabank = new UitDatabank(
            $this->config['key'],
            $this->config['secret'],
            $this->config['server']
        );
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->uitDatabank = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->assertEquals($this->config['key'], $this->uitDatabank->getKey());
        $this->assertEquals($this->config['secret'], $this->uitDatabank->getSecret());
        $this->assertEquals($this->config['server'], $this->uitDatabank->getServer());

        $this->uitDatabank->setTimeOut(5);
        $this->assertEquals(5, $this->uitDatabank->getTimeOut());

        $this->uitDatabank->setUserAgent('testing/1.0.0');
        $this->assertEquals('PHP UitDatabank/' . UitDatabank::VERSION . ' testing/1.0.0', $this->uitDatabank->getUserAgent());
    }
}
