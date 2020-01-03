<?php

namespace Valenture\CanvasApi\Modules\Users\Objects;

/**
 * Class UserPseudonym
 *
 * Used in Creating Users
 *
 * @package Valenture\CanvasApi\Modules\Users\Objects
 */
final class UserPseudonym
{
    /**
     * @var string User's login ID. If this is a self-registration, it must be a valid email address.
     */
    private $uniqueId;

    /**
     * @var string User's password. Cannot be set during self-registration.
     */
    private $password;

    /**
     * @var string SIS ID for the user's account. To set this parameter, the caller must be able to manage SIS permissions.
     */
    private $sisUserId;

    /**
     * @var string Integration ID for the login. To set this parameter, the caller must be able to manage SIS permissions. The Integration ID is a secondary identifier useful for more complex SIS integrations.
     */
    private $integrationId;

    /**
     * @var bool Send user notification of account creation if true. Automatically set to true during self-registration.
     */
    private $sendConfirmation;

    /**
     * @var bool Send user a self-registration style email if true. Setting it means the users will get a notification asking them to “complete the registration process” by clicking it, setting a password, and letting them in. Will only be executed on if the user does not need admin approval. Defaults to false unless explicitly provided.
     */
    private $forceSelfRegistration;

    /**
     * @var string The authentication provider this login is associated with. Logins associated with a specific provider can only be used with that provider. Legacy providers (LDAP, CAS, SAML) will search for logins associated with them, or unassociated logins. New providers will only search for logins explicitly associated with them. This can be the integer ID of the provider, or the type of the provider (in which case, it will find the first matching provider).
     */
    private $authenticationProviderId;

    /**
     * @return string
     */
    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

    /**
     * @param string $uniqueId
     */
    public function setUniqueId(string $uniqueId): void
    {
        $this->uniqueId = $uniqueId;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSisUserId(): ?string
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
    public function getIntegrationId(): ?string
    {
        return $this->integrationId;
    }

    /**
     * @param string $integrationId
     */
    public function setIntegrationId(string $integrationId): void
    {
        $this->integrationId = $integrationId;
    }

    /**
     * @return bool
     */
    public function isSendConfirmation(): bool
    {
        return $this->sendConfirmation;
    }

    /**
     * @param bool $sendConfirmation
     */
    public function setSendConfirmation(bool $sendConfirmation): void
    {
        $this->sendConfirmation = $sendConfirmation;
    }

    /**
     * @return bool
     */
    public function isForceSelfRegistration(): bool
    {
        return $this->forceSelfRegistration;
    }

    /**
     * @param bool $forceSelfRegistration
     */
    public function setForceSelfRegistration(bool $forceSelfRegistration): void
    {
        $this->forceSelfRegistration = $forceSelfRegistration;
    }

    /**
     * @return string
     */
    public function getAuthenticationProviderId(): ?string
    {
        return $this->authenticationProviderId;
    }

    /**
     * @param string $authenticationProviderId
     */
    public function setAuthenticationProviderId(string $authenticationProviderId): void
    {
        $this->authenticationProviderId = $authenticationProviderId;
    }

    public function toArray(): array
    {
        $data = [
            'unique_id' => $this->getUniqueId(),
            'password' => $this->getPassword(),
        ];

        if ($this->sisUserId) {
            $data['sis_user_id'] = $this->sisUserId;
        }
        if ($this->integrationId) {
            $data['integration_id'] = $this->integrationId;
        }
        if ($this->sendConfirmation) {
            $data['send_confirmation'] = $this->sendConfirmation;
        }
        if ($this->forceSelfRegistration) {
            $data['force_self_registration'] = $this->forceSelfRegistration;
        }
        if ($this->authenticationProviderId) {
            $data['authentication_provider_id'] = $this->authenticationProviderId;
        }

        return $data;
    }
}