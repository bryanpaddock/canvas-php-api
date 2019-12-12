<?php

namespace Valenture\CanvasApi;

use GuzzleHttp\ClientInterface;
use Valenture\CanvasApi\Config\CanvasConfig;
use Valenture\CanvasApi\Interfaces\CanvasApiInterface;
use Valenture\CanvasApi\Modules\Courses\CourseModule;
use Valenture\CanvasApi\Modules\Users\UserModule;

/**
 * Canvas PHP Api
 *
 * Requires:
 *  - CanvasConfig containing a client token to access the API
 *  - PSR7 compatible http client to perform the queries
 *
 * @package Valenture\CanvasApi
 */
final class CanvasApi implements CanvasApiInterface
{
    /**
     * @var CanvasConfig
     */
    private $config;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string URL Prefix to all endpoints.
     */
    private $apiPrefix = 'https://valentureonlinecampus.instructure.com/api/v1';

    /**
     * Account we are scoped to (default is just 1)
     *
     * @var int
     */
    private $accountId = 1;

    /**
     * CanvasApi constructor.
     *
     * @param CanvasConfig $config
     * @param ClientInterface $client
     */
    public function __construct(CanvasConfig $config, ClientInterface $client)
    {
        $this->config = $config;
        $this->client = $client;
    }

    /**
     * Returns the current Api config (token)
     *
     * @return CanvasConfig
     */
    public function getConfig(): CanvasConfig
    {
        return $this->config;
    }

    /**
     * Returns the http client instance in use
     *
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * Returns the current API prefix without trailing slash
     *
     * Default value is api/v1/users/
     *
     * @return string
     */
    public function getApiPrefix(): string
    {
        return $this->apiPrefix;
    }

    /**
     * Sets the current API prefix
     *
     * Usually used to change API versions on the fly. Probably wont be used much.
     *
     * @param string $apiPrefix
     */
    public function setApiPrefix(string $apiPrefix): void
    {
        $this->apiPrefix = $apiPrefix;
    }

    /**
     * Returns the CoursesModule
     *
     * @param int $userId
     *
     * @return CourseModule
     */
    public function getCoursesModule(int $userId): CourseModule
    {
        return new CourseModule($this, $this->accountId, $userId);
    }

    /**
     * Returns the UsersModule
     *
     * @return UserModule
     */
    public function getUsersModule(): UserModule
    {
        return new UserModule($this, $this->accountId);
    }
}
