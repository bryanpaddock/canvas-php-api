<?php

namespace Valenture\CanvasApi\Config;

/**
 * Class CanvasConfig
 *
 * Configuration class required for authentication with Canvas LMS
 *
 * @package Valenture\CanvasApi\Config
 */
final class CanvasConfig
{
    /**
     * Token as provided by OAuth2 Client
     *
     * @var string
     */
    private $token;

    /**
     * CanvasConfig constructor.
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}