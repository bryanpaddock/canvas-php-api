<?php

namespace Valenture\CanvasApi\Modules\Users;

use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use RuntimeException;
use Valenture\CanvasApi\CanvasApi;
use Valenture\CanvasApi\Interfaces\ModuleInterface;
use Valenture\CanvasApi\Modules\AbstractModule;
use Valenture\CanvasApi\Modules\Users\Factories\UserFactory;
use Valenture\CanvasApi\Modules\Users\Objects\User;
use Valenture\CanvasApi\Modules\Users\Requests\CreateUserRequest;
use Valenture\CanvasApi\Shared\PaginationTrait;
use function GuzzleHttp\Psr7\parse_header;

/**
 * Class UserModule
 *
 * Responsible for all User-focused tasks
 *
 * @package Valenture\CanvasApi\Modules\Users
 */
final class UserModule extends AbstractModule implements ModuleInterface
{
    /**
     * Adds pagination functionality
     */
    use PaginationTrait;

    /**
     * @var string The API prefix without leading slash
     */
    private $apiSuffix = '/accounts/%d/users';

    /**
     * UserModule constructor.
     *
     * @param CanvasApi $api
     * @param int       $accountId
     */
    public function __construct(CanvasApi $api, int $accountId = 1)
    {
        parent::__construct($api, $accountId);

        $this->setAccountId($accountId);
    }

    /**
     * Sets the AccountId and updates the ApiSuffix to include the new account id
     *
     * @param int $accountId
     */
    public function setAccountId(int $accountId): void
    {
        $this->apiSuffix = sprintf($this->apiSuffix, $accountId);
    }

    /**
     * Creates a user and returns the newly created user
     *
     * @param CreateUserRequest $createUserRequest
     * @return User
     * @throws Exception
     */
    public function createUser(CreateUserRequest $createUserRequest): User
    {
        $headers = ['Authorization' => 'Bearer ' . $this->getApi()->getConfig()->getToken()];

        $url = $this->getApi()->getApiPrefix() . $this->apiSuffix;
        $url .= '?' . http_build_query($createUserRequest->toArray());

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->post($url, [
                'headers' => $headers,
            ]);

            $body = $guzzleResponse->getBody()->getContents();
            $json = json_decode($body, false, 512, JSON_THROW_ON_ERROR);

            return UserFactory::make($json);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Users/CreateUser Error: ' . $msg;

            throw new RuntimeException($errorMessage);
        }
    }

    /**
     * Returns a listing of the users with optional search parameters
     *
     * @param Parameters\ListUserParameters|null $listUserParameters Optional Search parameters
     * @return User[]
     * @throws Exception
     */
    public function listUsers(?Parameters\ListUserParameters $listUserParameters): array
    {
        $headers = ['Authorization' => 'Bearer ' . $this->getApi()->getConfig()->getToken()];

        $url = $this->getApi()->getApiPrefix() . $this->apiSuffix;
        $url .= '?' . http_build_query($listUserParameters->toArray() + ['page' => $this->getPage(), 'per_page' => $this->getPerPage()]);

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->get($url, [
                'headers' => $headers
            ]);

            $body = $guzzleResponse->getBody()->getContents();

            // $parsed = parse_header($guzzleResponse->getHeader('Link'));

            return UserFactory::makeCollection($body);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Users/ListUsers Error: ' . $msg;

            throw new RuntimeException($errorMessage);
        }
    }

    /**
     * Fetches a users details
     *
     * @param int $userId
     * @return User
     * @throws Exception
     */
    public function viewUserDetails(int $userId): User
    {
        $headers = ['Authorization' => 'Bearer ' . $this->getApi()->getConfig()->getToken()];

        $url = $this->getApi()->getApiPrefix() . $this->apiSuffix;

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->get($url, [
                'headers' => $headers
            ]);

            $body = $guzzleResponse->getBody()->getContents();

            // $parsed = parse_header($guzzleResponse->getHeader('Link'));
            $json = json_decode($body, false, 512, JSON_THROW_ON_ERROR);

            print_r($json);

            return UserFactory::make($json);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Users/ListUsers Error: ' . $msg;

            throw new RuntimeException($errorMessage);
        }
    }
}
