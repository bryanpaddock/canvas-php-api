<?php

namespace Valenture\CanvasApi\Modules\Conversations;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use RuntimeException;
use Valenture\CanvasApi\Interfaces\ModuleInterface;
use Valenture\CanvasApi\Modules\AbstractModule;
use Valenture\CanvasApi\Modules\Comms\Factories\CommMessageFactory;
use Valenture\CanvasApi\Modules\Conversations\Objects\Conversation;

/**
 * Class ConversationModule
 *
 * @package Valenture\CanvasApi\Modules\Conversations
 */
final class ConversationModule extends AbstractModule implements ModuleInterface
{
    /**
     * @var string API Suffix for list conversations
     */
    private $endpointListConversationsSuffix = '/conversations';

    /**
     * Returns a listing of messages
     *
     * @return Conversation[]
     */
    public function listMessages(): array
    {
        $url = $this->getApi()->getApiPrefix() . $this->endpointListConversationsSuffix;

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->get($url, [
                'headers' => $this->getAuthHeader()
            ]);

            $body = $guzzleResponse->getBody()->getContents();

            return CommMessageFactory::makeCollection($body);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Conversations/ListMessages Error: ' . $msg;

            throw new RuntimeException($errorMessage);
        }
    }
}