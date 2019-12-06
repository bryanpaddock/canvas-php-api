<?php

namespace Valenture\CanvasApi\Modules\Users\Objects;

/**
 * Class Profile
 *
 * Represents a Users Profile in Canvas
 *
 * @package Valenture\CanvasApi\Modules\Users\Objects
 */
final class Profile
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $sortableName;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $bio;

    /**
     * @var string
     */
    private $primaryEmail;

    /**
     * @var string
     */
    private $loginId;

    /**
     * @var string
     */
    private $sisUserId;

    /**
     * @var string
     */
    private $ltiUserId;

    /**
     * @var string
     */
    private $avatarUrl;

    /**
     * @var string
     */
    private $calendar;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * @var string
     */
    private $locale;

    /**
     * Profile constructor.
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

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
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName(string $shortName): void
    {
        $this->shortName = $shortName;
    }

    /**
     * @return string
     */
    public function getSortableName(): string
    {
        return $this->sortableName;
    }

    /**
     * @param string $sortableName
     */
    public function setSortableName(string $sortableName): void
    {
        $this->sortableName = $sortableName;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBio(): string
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return string
     */
    public function getPrimaryEmail(): string
    {
        return $this->primaryEmail;
    }

    /**
     * @param string $primaryEmail
     */
    public function setPrimaryEmail(string $primaryEmail): void
    {
        $this->primaryEmail = $primaryEmail;
    }

    /**
     * @return string
     */
    public function getLoginId(): string
    {
        return $this->loginId;
    }

    /**
     * @param string $loginId
     */
    public function setLoginId(string $loginId): void
    {
        $this->loginId = $loginId;
    }

    /**
     * @return string
     */
    public function getSisUserId(): string
    {
        return $this->sisUserId;
    }

    /**
     * @param string $sisUserId
     */
    public function setSisUserId(string $sisUserId): void
    {
        $this->sisUserId = $sisUserId;
    }

    /**
     * @return string
     */
    public function getLtiUserId(): string
    {
        return $this->ltiUserId;
    }

    /**
     * @param string $ltiUserId
     */
    public function setLtiUserId(string $ltiUserId): void
    {
        $this->ltiUserId = $ltiUserId;
    }

    /**
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $avatarUrl
     */
    public function setAvatarUrl(string $avatarUrl): void
    {
        $this->avatarUrl = $avatarUrl;
    }

    /**
     * @return string
     */
    public function getCalendar(): string
    {
        return $this->calendar;
    }

    /**
     * @param string $calendar
     */
    public function setCalendar(string $calendar): void
    {
        $this->calendar = $calendar;
    }

    /**
     * @return string
     */
    public function getTimeZone(): string
    {
        return $this->timeZone;
    }

    /**
     * @param string $timeZone
     */
    public function setTimeZone(string $timeZone): void
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }
}

