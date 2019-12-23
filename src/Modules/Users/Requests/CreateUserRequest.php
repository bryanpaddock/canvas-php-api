<?php

namespace Valenture\CanvasApi\Modules\Users\Requests;

use Valenture\CanvasApi\Modules\Users\Objects\CommunicationChannel;
use Valenture\CanvasApi\Modules\Users\Objects\User;
use Valenture\CanvasApi\Modules\Users\Objects\UserPseudonym;

/**
 * Class CreateUserRequest
 *
 * Formats the User object into the correct format for creating a user
 *
 * Canvas require that the request is user[name] instead of just [name].
 *
 * @package Valenture\CanvasApi\Modules\Users\Requests
 */
final class CreateUserRequest
{
    /**
     * @var User User to create
     */
    private $user;

    /**
     * @var UserPseudonym Users pseudonym to create
     */
    private $userPseudonym;

    /**
     * @var CommunicationChannel
     */
    private $communicationChannel;

    /**
     * @var bool If true, validations are performed on the newly created user (and their associated pseudonym) even if the request is made by a privileged user like an admin. When set to false, or not included in the request parameters, any newly created users are subject to validations unless the request is made by a user with a 'manage_user_logins' right. In which case, certain validations such as 'require_acceptance_of_terms' and 'require_presence_of_name' are not enforced. Use this parameter to return helpful json errors while building users with an admin request.
     */
    private $forceValidations = false;

    /**
     * @var bool When true, will first try to re-activate a deleted user with matching sis_user_id if possible. This is commonly done with user and communication_channel so that the default communication_channel is also restored.
     *
     * @link https://canvas.instructure.com/doc/api/skip_registration
     * @link https://canvas.instructure.com/doc/api/skip_confirmation
     */
    private $enableSisReactivation = false;

    /**
     * @var string If you're setting the password for the newly created user, you can provide this param with a valid URL pointing into this Canvas installation, and the response will include a destination field that's a URL that you can redirect a browser to and have the newly created user automatically logged in. The URL is only valid for a short time, and must match the domain this request is directed to, and be for a well-formed path that Canvas can recognize.
     */
    private $destination = '';

    /**
     * CreateUserRequest constructor.
     *
     * @param User                 $user
     * @param UserPseudonym        $userPseudonym
     * @param CommunicationChannel $communicationChannel
     */
    public function __construct(User $user, UserPseudonym $userPseudonym, CommunicationChannel $communicationChannel)
    {
        $this->user = $user;
        $this->userPseudonym = $userPseudonym;
        $this->communicationChannel = $communicationChannel;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return UserPseudonym
     */
    public function getUserPseudonym(): UserPseudonym
    {
        return $this->userPseudonym;
    }

    /**
     * @param UserPseudonym $userPseudonym
     */
    public function setUserPseudonym(UserPseudonym $userPseudonym): void
    {
        $this->userPseudonym = $userPseudonym;
    }

    /**
     * @return CommunicationChannel
     */
    public function getCommunicationChannel(): CommunicationChannel
    {
        return $this->communicationChannel;
    }

    /**
     * @param CommunicationChannel $communicationChannel
     */
    public function setCommunicationChannel(CommunicationChannel $communicationChannel): void
    {
        $this->communicationChannel = $communicationChannel;
    }

    /**
     * @return bool
     */
    public function isForceValidations(): bool
    {
        return $this->forceValidations;
    }

    /**
     * @param bool $forceValidations
     */
    public function setForceValidations(bool $forceValidations): void
    {
        $this->forceValidations = $forceValidations;
    }

    /**
     * @return bool
     */
    public function isEnableSisReactivation(): bool
    {
        return $this->enableSisReactivation;
    }

    /**
     * @param bool $enableSisReactivation
     */
    public function setEnableSisReactivation(bool $enableSisReactivation): void
    {
        $this->enableSisReactivation = $enableSisReactivation;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination(string $destination): void
    {
        if (! filter_var($destination, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Destination must be a valid URL');
        }

        $this->destination = $destination;
    }

    /**
     * Canvas require the user fields be in a specific format.
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'user[name]' => $this->user->getName(),
            'user[short_name]' => $this->user->getShortName(),
            'user[sortable_name]' => $this->user->getSortableName(),
        ];

        if ($this->user->getTimezone()) {
            $data['user[time_zone]'] = $this->user->getTimezone();
        }

        if ($this->user->getLocale()) {
            $data['user[locale]'] = $this->user->getLocale();
        }

        if ($this->user->isTermsOfUse()) {
            $data['user[terms_of_use]'] = $this->user->isTermsOfUse();
        }
        if ($this->user->isSkipRegistration()) {
            $data['user[skip_registration]'] = $this->user->isSkipRegistration();
        }

        $data += [
            'pseudonym[unique_id]' => $this->userPseudonym->getUniqueId(),
            'pseudonym[password]' => $this->userPseudonym->getPassword(),
        ];

        if ($this->userPseudonym->getSisUserId()) {
            $data['pseudonym[sis_user_id'] = $this->userPseudonym->getSisUserId();
        }
        if ($this->userPseudonym->getIntegrationId()) {
            $data['pseudonym[integration_id]'] = $this->userPseudonym->getIntegrationId();
        }
        if ($this->userPseudonym->isSendConfirmation()) {
            $data['pseudonym[send_confirmation]'] = $this->userPseudonym->isSendConfirmation();
        }
        if ($this->userPseudonym->isForceSelfRegistration()) {
            $data['pseudonym[force_self_registration]'] = $this->userPseudonym->isForceSelfRegistration();
        }
        if ($this->userPseudonym->getAuthenticationProviderId()) {
            $data['pseudonym[authentication_provider_id]'] = $this->userPseudonym->getAuthenticationProviderId();
        }

        $data += [
            'communication_channel[type]' => $this->communicationChannel->getType(),
            'communication_channel[address]' => $this->communicationChannel->getAddress(),
            'communication_channel[confirmation_url]' => $this->communicationChannel->isConfirmationUrl(),
            'communication_channel[skip_confirmation]' => $this->communicationChannel->isSkipConfirmation(),
        ];

        if ($this->isForceValidations()) {
            $data['force_validations'] = $this->isForceValidations()];
        }
        if ($this->isEnableSisReactivation()) {
            $data['enable_sis_reactivation'] = $this->isEnableSisReactivation();
        }
        if ($this->getDestination()) {
            $data['destination'] = $this->getDestination();
        }

        return $data;
    }
}
