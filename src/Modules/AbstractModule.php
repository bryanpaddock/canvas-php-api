<?php

namespace Valenture\CanvasApi\Modules;

use Valenture\CanvasApi\CanvasApi;

/**
 * Class AbstractModule
 *
 * Contains the API instance shared by all Modules
 *
 * @package Valenture\CanvasApi\Modules
 */
abstract class AbstractModule
{
    /**
     * @var CanvasApi Canvas API instance
     */
    private $api;

    /**
     * @var string The account ID to perform user actions on
     */
    private $accountId = 1;

    /**
     * UserModule constructor.
     *
     * @param CanvasApi $api
     * @param int $accountId
     */
    public function __construct(CanvasApi $api, ?int $accountId)
    {
        $this->api = $api;

        if ($accountId) {
            $this->accountId = $accountId;
        }
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @return CanvasApi
     */
    public function getApi(): CanvasApi
    {
        return $this->api;
    }
}
