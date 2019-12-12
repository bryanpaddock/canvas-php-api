<?php

namespace Valenture\CanvasApi\Modules\Courses\Objects;

use DateTime;

/**
 * Class CourseTerm
 *
 * Represents a single term (eg First Term, 2020)
 *
 * @package Valenture\CanvasApi\Modules\Courses\Objects
 */
final class CourseTerm
{
    /**
     * @var string
     */
    private $id;

    /**
     * The unique SIS identifier for the term.
     *
     * @var string
     */
    private $sisTermId;

    /**
     * @var string
     */
    private $sisImportId;

    /**
     * The name of the term.
     *
     * @var string
     */
    private $name;

    /**
     * The day/time the term starts. Accepts times in ISO 8601 format, e.g. 2015-01-10T18:48:00Z.
     *
     * @var DateTime
     */
    private $startsAt;

    /**
     * The day/time the term ends. Accepts times in ISO 8601 format, e.g. 2015-01-10T18:48:00Z.
     *
     * @var DateTime
     */
    private $endsAt;

    /**
     * Workflow state. Either active or deleted.
     *
     * @var string
     */
    private $workflowState;

    /**
     * @var
     */
    private $overrides;

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
    public function getSisTermId(): string
    {
        return $this->sisTermId;
    }

    /**
     * @param string $sisTermId
     */
    public function setSisTermId(string $sisTermId): void
    {
        $this->sisTermId = $sisTermId;
    }

    /**
     * @return string
     */
    public function getSisImportId(): string
    {
        return $this->sisImportId;
    }

    /**
     * @param string $sisImportId
     */
    public function setSisImportId(string $sisImportId): void
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
     * @return DateTime
     */
    public function getStartsAt(): DateTime
    {
        return $this->startsAt;
    }

    /**
     * @param DateTime $startsAt
     */
    public function setStartsAt(DateTime $startsAt): void
    {
        $this->startsAt = $startsAt;
    }

    /**
     * @return DateTime
     */
    public function getEndsAt(): DateTime
    {
        return $this->endsAt;
    }

    /**
     * @param DateTime $endsAt
     */
    public function setEndsAt(DateTime $endsAt): void
    {
        $this->endsAt = $endsAt;
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
     * @return mixed
     */
    public function getOverrides()
    {
        return $this->overrides;
    }

    /**
     * @param mixed $overrides
     */
    public function setOverrides($overrides): void
    {
        $this->overrides = $overrides;
    }

    public function toArray(): array
    {

    }
}