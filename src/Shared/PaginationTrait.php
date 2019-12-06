<?php

namespace Valenture\CanvasApi\Shared;

/**
 * Trait PaginationTrait
 *
 * Provides Pagination to API calls
 *
 * @package Valenture\CanvasApi\Shared
 */
trait PaginationTrait
{
    private $page;
    private $perPage;

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page): void
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage($perPage): void
    {
        $this->perPage = $perPage;
    }

    /**
     * Returns array representation that fits canvas url format
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'per_page' => $this->perPage
        ];
    }
}