<?php

namespace Valenture\CanvasApi\Modules\SisImport;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Valenture\CanvasApi\CanvasApi;
use Valenture\CanvasApi\Interfaces\ModuleInterface;
use Valenture\CanvasApi\Modules\AbstractModule;
use Valenture\CanvasApi\Modules\SisImport\Factories\SisImportFactory;
use Valenture\CanvasApi\Modules\SisImport\Objects\SisImport;
use Valenture\CanvasApi\Modules\Users\Factories\UserFactory;

/**
 * Class SisImportModule
 *
 * Handles all CSV imports to Canvas
 *
 * @package Valenture\CanvasApi\Modules\SisImport
 */
final class SisImportModule extends AbstractModule implements ModuleInterface
{
    /**
     * @var string The API prefix without leading slash
     */
    private $apiSuffix = '/accounts/%d/sis_imports';

    /**
     * SisImportModule constructor.
     *
     * @param CanvasApi $canvasApi
     * @param int $accountId
     */
    public function __construct(CanvasApi $canvasApi, int $accountId = 1)
    {
        parent::__construct($canvasApi, $accountId);
    }

    public function importEnrollments(string $filename): SisImport
    {
        $multipart = [
            'name' => 'instructure_csv',
            'contents' => file_get_contents($filename),
            'filename' => 'enrollments.csv'
        ];

        $headers = ['Authorization' => 'Bearer ' . $this->getApi()->getConfig()->getToken()];

        $url = $this->getApi()->getApiPrefix() . $this->apiSuffix;

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->post($url, [
                'headers' => $headers,
                'multipart' => $multipart
            ]);

            $body = $guzzleResponse->getBody()->getContents();
            $json = json_decode($body, false, 512, JSON_THROW_ON_ERROR);

            return SisImportFactory::make($json);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Users/CreateUser Error: ' . $msg;

            throw new RuntimeException($errorMessage);
        }
    }
}