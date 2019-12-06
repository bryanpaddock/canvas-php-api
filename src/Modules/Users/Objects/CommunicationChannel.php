<?php

namespace Valenture\CanvasApi\Modules\Users\Objects;

/**
 * Class CommunicationChannel
 *
 * Represents a Users CommunicationChannel
 *
 * @package Valenture\CanvasApi\Modules\Users\Objects
 */
final class CommunicationChannel
{
    /**
     * @var string The communication channel type, e.g. 'email' or 'sms'.
     */
    private $type;

    /**
     * @var string The communication channel address, e.g. the user's email address.
     */
    private $address;

    /**
     * @var bool Only valid for account admins. If true, returns the new user account confirmation URL in the response.
     */
    private $confirmationUrl;

    /**
     * @var bool Only valid for site admins and account admins making requests; If true, the channel is automatically validated and no confirmation email or SMS is sent. Otherwise, the user must respond to a confirmation message to confirm the channel.
     *           If this is true, it is recommended to set "pseudonym[send_confirmation]" to true as well. Otherwise, the user will not receive any messages about their account creation.
     */
    private $skipConfirmation;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return bool
     */
    public function isConfirmationUrl(): bool
    {
        return $this->confirmationUrl;
    }

    /**
     * @param bool $confirmationUrl
     */
    public function setConfirmationUrl(bool $confirmationUrl): void
    {
        $this->confirmationUrl = $confirmationUrl;
    }

    /**
     * @return bool
     */
    public function isSkipConfirmation(): bool
    {
        return $this->skipConfirmation;
    }

    /**
     * @param bool $skipConfirmation
     */
    public function setSkipConfirmation(bool $skipConfirmation): void
    {
        $this->skipConfirmation = $skipConfirmation;
    }
}
