<?php

namespace Valenture\CanvasApi\Interfaces;

use GuzzleHttp\ClientInterface;
use Valenture\CanvasApi\Config\CanvasConfig;
use Valenture\CanvasApi\Modules\Courses\CourseModule;
use Valenture\CanvasApi\Modules\Users\UserModule;

/**
 * Interface CanvasApiInterface
 *
 * Defines all the methods that this API uses
 *
 * @package Valenture\CanvasApi\Interfaces
 */
interface CanvasApiInterface
{
    public function __construct(CanvasConfig $config, ClientInterface $client);

    public function getConfig(): CanvasConfig;
    public function getClient(): ClientInterface;

    public function getApiPrefix(): string;
    public function setApiPrefix(string $apiPrefix): void;

    public function getCoursesModule(int $userId): CourseModule;
    public function getUsersModule($accountId): UserModule;
}
