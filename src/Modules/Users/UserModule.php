<?php

namespace Valenture\CanvasApi\Modules\Users;

use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
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
    use PaginationTrait;

    /**
     * @var string The account ID to perform user actions on
     */
    private $accountId;

    /**
     * @var string The API prefix without leading slash
     */
    private $apiSuffix = '/accounts/%d/users';

    /**
     * UserModule constructor.
     *
     * @param CanvasApi $api
     * @param string    $accountId
     */
    public function __construct(CanvasApi $api, string $accountId)
    {
        parent::__construct($api);

        $this->setAccountId($accountId);
    }

    /**
     * Returns the current AccountId we are scoped to
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * Sets the AccountId and updates the ApiSuffix to include the new account id
     *
     * @param string $accountId
     */
    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
        $this->apiSuffix = sprintf($this->apiSuffix, $this->accountId);
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
            $json = json_decode($body);

            return UserFactory::make($json);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Users/CreateUser Error: ' . $msg;

            throw new Exception($errorMessage);
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

            throw new Exception($errorMessage);
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
            $json = json_decode($body);

            print_r($json);

            return UserFactory::make($json);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Users/ListUsers Error: ' . $msg;

            throw new Exception($errorMessage);
        }
    }
}
