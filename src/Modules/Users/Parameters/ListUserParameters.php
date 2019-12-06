<?php

namespace Valenture\CanvasApi\Modules\Users\Parameters;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Class ListUserParameters
 *
 * Contains the search parameters that can be set for Users Module
 *
 * @package Valenture\CanvasApi\Modules\Users\Parameters
 */
final class ListUserParameters implements JsonSerializable
{
    /**
     * @var string The partial name or full ID of the users to match and return in the results list. Must be at least 3 characters.
     *
     * Note that the API will prefer matching on canonical user ID if the ID has a numeric form. It will only search against other fields if non-numeric in form, or if the numeric value doesn't yield any matches. Queries by administrative users will search on SIS ID, login ID, name, or email address
     */
    private $searchTerm;

    /**
     * @var string When set, only return users enrolled with the specified course-level base role. This can be a base role type of 'student', 'teacher', 'ta', 'observer', or 'designer'.
     */
    private $enrollmentType;

    /**
     * @var string The column to sort results by.
     *
     * Allowed values: username, email, sis_id, last_login
     */
    private $sort;

    /**
     * @var string The order to sort the given column by.
     *
     * Allowed values: asc, desc
     */
    private $order;

    /**
     * @param string $searchTerm
     */
    public function setSearchTerm(string $searchTerm): void
    {
        $this->searchTerm = $searchTerm;
    }

    /**
     * @param string $enrollmentType
     */
    public function setEnrollmentType(string $enrollmentType): void
    {
        $this->enrollmentType = $enrollmentType;
    }

    /**
     * @param string $sort
     */
    public function setSort(string $sort): void
    {
        $allowedSortOptions = ['username', 'email', 'sis_id', 'last_login'];

        if (! in_array($sort, $allowedSortOptions)) {
            throw new InvalidArgumentException('Invalid order setting. Must be one of: ' . join(', ', $allowedSortOptions));
        }

        $this->sort = $sort;
    }

    /**
     * @param string $order
     */
    public function setOrder(string $order): void
    {
        if (! in_array($order, ['asc', 'desc'])) {
            throw new InvalidArgumentException('Invalid order setting. Must be one of: asc, desc');
        }

        $this->order = $order;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Returns an array representation of this object
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'search_term' => $this->searchTerm,
            'enrollment_type' => $this->enrollmentType,
            'sort' => $this->sort,
            'order' => $this->order,
        ];
    }
}