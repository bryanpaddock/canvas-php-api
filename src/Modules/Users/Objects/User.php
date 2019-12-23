<?php

namespace Valenture\CanvasApi\Modules\Users\Objects;

use DateTime;
use JsonSerializable;

/**
 * Class User
 *
 * Represents a User on the Canvas LMS
 *
 * @package Valenture\CanvasApi\Modules\Users\Objects
 */
final class User implements JsonSerializable
{
    /**
     * @var int User id
     */
    private $id;

    /**
     * @var string User name
     */
    private $name;

    /**
     * @var string User name in sortable format (surname, name)
     */
    private $sortableName;

    /**
     * @var string User short name they set by themselves
     */
    private $shortName;

    /**
     * @var DateTime
     */
    private $birthdate;

    /**
     * @var string|null User SIS Id associated with this account. This field is only included if the user came from a SIS import and has permissions to view SIS information.
     */
    private $sisUserId;

    /**
     * @var string|null The id of the SIS import.  This field is only included if the user came from a SIS import and has permissions to manage SIS information.
     */
    private $sisImportId;

    /**
     * @var string|null The integration_id associated with the user.  This field is only included if the user came from a SIS import and has permissions to view SIS information.
     */
    private $integrationId;

    /**
     * @var string The unique login id for the user.  This is what the user uses to log in to Canvas.
     */
    private $loginId;

    /**
     * @var string|null If avatars are enabled, this field will be included and contain a url to retrieve the user's avatar.
     */
    private $avatarUrl;

    /**
     * @var string|null  This field can be requested with certain API calls, and will return a list of the users active enrollments. See the List enrollments API for more details about the format of these records.
     */
    private $enrollments;

    /**
     * @var string|null This field can be requested with certain API calls, and will return the users primary email address.
     */
    private $email;

    /**
     * @var string|null This field can be requested with certain API calls, and will return the users locale in RFC 5646 format.
     */
    private $locale;

    /**
     * @var DateTime|null This field is only returned in certain API calls, and will return a timestamp representing the last time the user logged in to canvas.
     */
    private $lastLogin;

    /**
     * @var string|null This field is only returned in certain API calls, and will return the IANA time zone name of the user's preferred timezone.
     */
    private $timezone;

    /**
     * @var string|null The user's bio.
     */
    private $bio;

    /**
     * Whether the user accepts the terms of use. Required if this is a self-registration and this canvas instance requires users to accept the terms (on by default).
     *
     * If this is true, it will mark the user as having accepted the terms of use.
     *
     * @var bool
     */
    private $termsOfUse;

    /**
     * Automatically mark the user as registered.
     *
     * If this is true, it is recommended to set "pseudonym[send_confirmation]" to true as well. Otherwise, the user will not receive any messages about their account creation.
     *
     * The users communication channel confirmation can be skipped by setting "communication_channel[skip_confirmation]" to true as well.
     *
     * @var bool
     */
    private $skipRegistration;

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $sortableName
     */
    public function setSortableName(string $sortableName): void
    {
        $this->sortableName = $sortableName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName(string $shortName): void
    {
        $this->shortName = $shortName;
    }

    /**
     * @param string|null $sisUserId
     */
    public function setSisUserId(?string $sisUserId): void
    {
        $this->sisUserId = $sisUserId;
    }

    /**
     * @param string|null $sisImportId
     */
    public function setSisImportId(?string $sisImportId): void
    {
        $this->sisImportId = $sisImportId;
    }

    /**
     * @param string|null $integrationId
     */
    public function setIntegrationId(?string $integrationId): void
    {
        $this->integrationId = $integrationId;
    }

    /**
     * @param string $loginId
     */
    public function setLoginId(string $loginId): void
    {
        $this->loginId = $loginId;
    }

    /**
     * @param string|null $avatarUrl
     */
    public function setAvatarUrl(?string $avatarUrl): void
    {
        $this->avatarUrl = $avatarUrl;
    }

    /**
     * @param string|null $enrollments
     */
    public function setEnrollments(?string $enrollments): void
    {
        $this->enrollments = $enrollments;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string|null $locale
     */
    public function setLocale(?string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @param DateTime|null $lastLogin
     */
    public function setLastLogin(?DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @param string|null $timezone
     */
    public function setTimezone(?string $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * @param string|null $bio
     */
    public function setBio(?string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSortableName(): string
    {
        return $this->sortableName;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @return string|null
     */
    public function getSisUserId(): ?string
    {
        return $this->sisUserId;
    }

    /**
     * @return string|null
     */
    public function getSisImportId(): ?string
    {
        return $this->sisImportId;
    }

    /**
     * @return string|null
     */
    public function getIntegrationId(): ?string
    {
        return $this->integrationId;
    }

    /**
     * @return string
     */
    public function getLoginId(): string
    {
        return $this->loginId;
    }

    /**
     * @return string|null
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    /**
     * @return string|null
     */
    public function getEnrollments(): ?string
    {
        return $this->enrollments;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @return DateTime|null
     */
    public function getLastLogin(): ?DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @return DateTime
     */
    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param DateTime $birthdate
     */
    public function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return bool
     */
    public function isTermsOfUse(): bool
    {
        return $this->termsOfUse;
    }

    /**
     * @param bool $termsOfUse
     */
    public function setTermsOfUse(bool $termsOfUse): void
    {
        $this->termsOfUse = $termsOfUse;
    }

    /**
     * @return bool
     */
    public function isSkipRegistration(): bool
    {
        return $this->skipRegistration;
    }

    /**
     * @param bool $skipRegistration
     */
    public function setSkipRegistration(bool $skipRegistration): void
    {
        $this->skipRegistration = $skipRegistration;
    }

    public function toArray(): array
    {
        $return = [
            'name' => $this->name,
            'sortable_name' => $this->sortableName,
            'short_name' => $this->shortName,
            'email' => $this->email,
        ];

        if ($this->id) {
            $return['id'] = $this->id;
        }

        if ($this->sisUserId) {
            $return['sis_user_id'] = $this->sisUserId;
        }

        if ($this->sisImportId) {
            $return['sis_import_id'] = $this->sisImportId;
        }

        if ($this->integrationId) {
            $return['integration_id'] = $this->integrationId;
        }

        if ($this->loginId) {
            $return['login_id'] = $this->loginId;
        }

        if ($this->avatarUrl) {
            $return['avatar_url'] = $this->avatarUrl;
        }

        if ($this->enrollments) {
            $return['enrollments'] = $this->enrollments;
        }

        if ($this->locale) {
            $return['locale'] = $this->locale;
        }

        if ($this->bio) {
            $return['bio'] = $this->bio;
        }

        if ($this->timezone) {
            $return['time_zone'] = $this->timezone;
        }

        if ($this->lastLogin) {
            $return['last_login'] = $this->lastLogin;
        }

        return $return;
    }
    /**
     * Returns the json representation of this user object
     *
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}