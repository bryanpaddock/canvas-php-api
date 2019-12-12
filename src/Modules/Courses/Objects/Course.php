<?php

namespace Valenture\CanvasApi\Modules\Courses\Objects;

use DateTime;

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
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $startAt;

    /**
     * @var DateTime
     */
    private $endAt;

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
     * @return string|null
     */
    public function getSisCourseId(): ?string
    {
        return $this->sisCourseId;
    }

    /**
     * @param string|null $sisCourseId
     */
    public function setSisCourseId(?string $sisCourseId): void
    {
        $this->sisCourseId = $sisCourseId;
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
     * @return string|null
     */
    public function getIntegrationId(): ?string
    {
        return $this->integrationId;
    }

    /**
     * @param string|null $integrationId
     */
    public function setIntegrationId(?string $integrationId): void
    {
        $this->integrationId = $integrationId;
    }

    /**
     * @return string|null
     */
    public function getSisImportId(): ?string
    {
        return $this->sisImportId;
    }

    /**
     * @param string|null $sisImportId
     */
    public function setSisImportId(?string $sisImportId): void
    {
        $this->sisImportId = $sisImportId;
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

    /**
     * @return string
     */
    public function getWorkflowState(): string
    {
        return $this->workflowState;
    }

    /**
     * @param string $workflowState
     */
    public function setWorkflowState(string $workflowState): void
    {
        $this->workflowState = $workflowState;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     */
    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getRootAccountId(): string
    {
        return $this->rootAccountId;
    }

    /**
     * @param string $rootAccountId
     */
    public function setRootAccountId(string $rootAccountId): void
    {
        $this->rootAccountId = $rootAccountId;
    }

    /**
     * @return string
     */
    public function getEnrollmentTermId(): string
    {
        return $this->enrollmentTermId;
    }

    /**
     * @param string $enrollmentTermId
     */
    public function setEnrollmentTermId(string $enrollmentTermId): void
    {
        $this->enrollmentTermId = $enrollmentTermId;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime
     */
    public function getStartAt(): DateTime
    {
        return $this->startAt;
    }

    /**
     * @param DateTime $startAt
     */
    public function setStartAt(DateTime $startAt): void
    {
        $this->startAt = $startAt;
    }

    /**
     * @return DateTime
     */
    public function getEndAt(): DateTime
    {
        return $this->endAt;
    }

    /**
     * @param DateTime $endAt
     */
    public function setEndAt(DateTime $endAt): void
    {
        $this->endAt = $endAt;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'course_code' => $this->courseCode,
            'start_at' => $this->startAt->format('c'),
            'end_at' => $this->endAt->format('c'),
            'license' => 'private',
            'is_public' => false,
        ];
    }
}
