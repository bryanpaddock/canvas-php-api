<?php

namespace Valenture\CanvasApi\Modules\Courses\Objects;

/**
 * Class Course
 *
 * Represents a course in Canvas
 *
 * @link https://canvas.instructure.com/doc/api/courses.html
 * @package Valenture\CanvasApi\Modules\Courses\Objects
 */
final class Course
{
    /**
     * @var string The unique identifier for the course
     */
    private $id;

    /**
     * @var string|null The SIS identifier for the course, if defined. This field is only included if the user has permission to view SIS information.
     */
    private $sisCourseId;

    /**
     * @var string The UUID of the course
     */
    private $uuid;

    /**
     * @var string|null The integration identifier for the course, if defined. This field is only included if the user has permission to view SIS information.
     */
    private $integrationId;

    /**
     * @var string|null The unique identifier for the SIS import. This field is only included if the user has permission to manage SIS information.
     */
    private $sisImportId;

    /**
     * @var string The full name of the course
     */
    private $name;

    /**
     * @var string The course code
     */
    private $courseCode;

    /**
     * @var string The current state of the course one of 'unpublished', 'available', 'completed', or 'deleted'
     */
    private $workflowState;

    /**
     * @var string the account associated with the course
     */
    private $accountId;

    /**
     * @var string The root account associated with the course
     */
    private $rootAccountId;

    /**
     * @var string The enrollment term associated with the course
     */
    private $enrollmentTermId;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCourseCode(): string
    {
        return $this->courseCode;
    }

    /**
     * @param string $courseCode
     */
    public function setCourseCode(string $courseCode): void
    {
        $this->courseCode = $courseCode;
    }



}
