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
     * UserModule constructor.
     *
     * @param CanvasApi $api
     */
    public function __construct(CanvasApi $api)
    {
        $this->api = $api;
    }

    /**
     * @return CanvasApi
     */
    public function getApi(): CanvasApi
    {
        return $this->api;
    }
}
