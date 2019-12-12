<?php

namespace Valenture\CanvasApi\Config;

/**
 * Class CanvasConfig
 *
 * Configuration class required for authentication with Canvas LMS.
 *
 * We currently only support token based authentication as we are only
 * performing admin functions with the API.
 *
 * If we were performing actions on behalf of students we would incorporate
 * Oauth2
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
