<?php


namespace Valenture\CanvasApi\Modules\Courses;

use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Valenture\CanvasApi\CanvasApi;
use Valenture\CanvasApi\Interfaces\ModuleInterface;
use Valenture\CanvasApi\Modules\AbstractModule;
use Valenture\CanvasApi\Modules\Courses\Factories\CourseFactory;
use Valenture\CanvasApi\Modules\Courses\Objects\Course;

final class CourseModule extends AbstractModule implements ModuleInterface
{
    /**
     * @var string User ID we are managing courses for
     */
    private $userId;

    /**
     * @var string The API prefix without leading slash. Set by setUserId()
     */
    private $listCoursesSuffix;

    /**
     * CourseModule constructor.
     *
     * @param CanvasApi $canvasApi
     * @param string    $userId
     */
    public function __construct(CanvasApi $canvasApi, string $userId)
    {
        $this->setUserId($userId);

        parent::__construct($canvasApi);
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;

        // configure all endpoints correctly
        $listCoursesSuffixTemplate = '/users/:user_id/courses';
        $this->listCoursesSuffix = str_replace(':user_id', $this->userId, $listCoursesSuffixTemplate);
    }

    /**
     * Returns a list of courses for the current userId
     *
     * @return Course[]
     * @throws Exception
     */
    public function listCourses(): array
    {
        $headers = ['Authorization' => 'Bearer ' . $this->getApi()->getConfig()->getToken()];

        $url = $this->getApi()->getApiPrefix() . $this->listCoursesSuffix;

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->get($url, [
                'headers' => $headers
            ]);

            $body = $guzzleResponse->getBody()->getContents();

            // $parsed = parse_header($guzzleResponse->getHeader('Link'));

            return CourseFactory::makeCollection($body);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Courses/ListCourses Error: ' . $msg;

            throw new Exception($errorMessage);
        }
    }

    /**
     * Enrolls a user to a course
     *
     * @param int $courseId
     * @param int $userId
     *
     * @return array|Course[]
     * @throws Exception
     */
    public function enrollUserToCourse(int $courseId, int $userId)
    {
        $headers = ['Authorization' => 'Bearer ' . $this->getApi()->getConfig()->getToken()];

        $url = $this->getApi()->getApiPrefix() . $this->listCoursesSuffix;

        try {
            /** @var Response $guzzleResponse */
            $guzzleResponse = $this->getApi()->getClient()->get($url, [
                'headers' => $headers
            ]);

            $body = $guzzleResponse->getBody()->getContents();

            // $parsed = parse_header($guzzleResponse->getHeader('Link'));

            return CourseFactory::makeCollection($body);
        } catch (RequestException $e) {
            $msg = $e->getMessage();
            $errorMessage = 'Courses/ListCourses Error: ' . $msg;

            throw new Exception($errorMessage);
        }
    }
}
