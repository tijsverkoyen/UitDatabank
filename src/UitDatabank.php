<?php
namespace TijsVerkoyen\UitDatabank;

/**
 * UitDatabank class
 *
 * @author    Tijs Verkoyen <php-uitdatabank@verkoyen.eu>
 * @version   2.0.0
 * @copyright Copyright (c), Tijs Verkoyen. All rights reserved.
 * @license   BSD License
 */
class UitDatabank
{
    const VERSION = "2.0.0";

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var string
     */
    private $server;

    /**
     * The timeout
     *
     * @var int
     */
    private $timeOut = 10;

    /**
     * The user agent
     *
     * @var string
     */
    private $userAgent;

    /**
     * Constructor
     *
     * @param string $key       The key to be used for authenticating
     * @param string $secret    The secret to be used for authenticating
     * @param string $server    The server to connect to
     */
    public function __construct($key, $secret, $server)
    {
        $this->setKey($key);
        $this->setSecret($secret);
        $this->setServer($server);
    }

    /**
     * Set the key that will be used
     *
     * @param string $key
     */
    protected function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Get the key that will be used
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the secret that will be used
     *
     * @param string $secret
     */
    protected function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * Get the secret that will be used
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set the server that will be used
     *
     * @param string $server
     */
    protected function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * Get the server that will be used
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set the timeout
     * After this time the request will stop. You should handle any errors triggered by this.
     *
     * @param int $seconds The timeout in seconds.
     */
    public function setTimeOut($seconds)
    {
        $this->timeOut = (int) $seconds;
    }

    /**
     * Get the timeout that will be used
     *
     * @return int
     */
    public function getTimeOut()
    {
        return (int) $this->timeOut;
    }

    /**
     * Get the useragent that will be used.
     * Our version will be prepended to yours.
     * It will look like: "PHP UitDatabank/<version> <your-user-agent>"
     *
     * @return string
     */
    public function getUserAgent()
    {
        return (string) 'PHP UitDatabank/' . self::VERSION . ' ' . $this->userAgent;
    }

    /**
     * Set the user-agent for you application
     * It will be appended to ours, the result will look like: "PHP UitDatabank/<version> <your-user-agent>"
     *
     * @param string $userAgent Your user-agent, it should look like <app-name>/<app-version>.
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = (string) $userAgent;
    }
}
