<?php

namespace Valenture\CanvasApi\Modules\Comms;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use RuntimeException;
use Valenture\CanvasApi\CanvasApi;
use Valenture\CanvasApi\Interfaces\ModuleInterface;
use Valenture\CanvasApi\Modules\AbstractModule;
use Valenture\CanvasApi\Modules\Comms\Factories\CommMessageFactory;
use Valenture\CanvasApi\Modules\Comms\Objects\CommMessage;

/**
 * Class CommsModule
 *
 * Provides CommMessage support to the API
 *
 * @package Valenture\CanvasApi\Modules\Comms
 */
final class CommsModule extends AbstractModule implements ModuleInterface
{
    /**
     * API endpoint suffix
     *
     * @var string
     */
    private $apiSuffix = '/comm_messages';

    /**
     * CommsModule constructor.
     *
     * @param CanvasApi $canvasApi
     * @param int $accountId
     */
    public function __construct(CanvasApi $canvasApi, int $accountId = 1)
    {
        parent::__construct($canvasApi, $accountId);
    }

    /**
     * @param string $userId
     * @return CommMessage[]
     */
    public function listMessages(string $userId): array
    {
        $url = $this->getApi()->getApiPrefix() . $this->apiSuffix;
        $url .= '?' . http_build_query(['user_id' => $userId]);

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->get($url, [
                'headers' => $this->getAuthHeader()
            ]);

            $body = $guzzleResponse->getBody()->getContents();

            // $parsed = parse_header($guzzleResponse->getHeader('Link'));

            return CommMessageFactory::makeCollection($body);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'CommMessages/ListMessages Error: ' . $msg;

            throw new RuntimeException($errorMessage);
        }
    }
}