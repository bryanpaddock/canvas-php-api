<?php

namespace Valenture\CanvasApi\Modules\Comms\Objects;

use DateTime;
use Valenture\CanvasApi\Modules\Comms\Enums\CommWorkflowStateEnum;

/**
 * Class CommMessage
 *
 * Represents a single message on canvas
 *
 * @link https://canvas.instructure.com/doc/api/comm_messages.html
 * @package Valenture\CanvasApi\Modules\Comms\Objects
 */
final class CommMessage
{
    /**
     * The ID of the CommMessage.
     *
     * @var string
     */
    private $id;

    /**
     * The date and time this message was created
     *
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $sentAt;

    /**
     * @var CommWorkflowStateEnum
     */
    private $workflowState;

    /**
     * The address that was put in the 'from' field of the message
     *
     * @var string
     */
    private $from;

    /**
     * The display name for the from address
     *
     * @var string
     */
    private $fromName;

    /**
     * The address the message was sent to:
     *
     * @var string
     */
    private $to;

    /**
     * The reply_to header of the message
     *
     * @var string
     */
    private $replyTo;

    /**
     * The message subject
     *
     * @var string
     */
    private $subject;

    /**
     * The plain text body of the message
     *
     * @var string
     */
    private $body;

    /**
     * The HTML body of the message.
     *
     * @var string
     */
    private $htmlBody;

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
    public function getSentAt(): DateTime
    {
        return $this->sentAt;
    }

    /**
     * @param DateTime $sentAt
     */
    public function setSentAt(DateTime $sentAt): void
    {
        $this->sentAt = $sentAt;
    }

    /**
     * @return CommWorkflowStateEnum
     */
    public function getWorkflowState(): CommWorkflowStateEnum
    {
        return $this->workflowState;
    }

    /**
     * @param CommWorkflowStateEnum $workflowState
     */
    public function setWorkflowState(CommWorkflowStateEnum $workflowState): void
    {
        $this->workflowState = $workflowState;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName;
    }

    /**
     * @param string $fromName
     */
    public function setFromName(string $fromName): void
    {
        $this->fromName = $fromName;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getReplyTo(): string
    {
        return $this->replyTo;
    }

    /**
     * @param string $replyTo
     */
    public function setReplyTo(string $replyTo): void
    {
        $this->replyTo = $replyTo;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getHtmlBody(): string
    {
        return $this->htmlBody;
    }

    /**
     * @param string $htmlBody
     */
    public function setHtmlBody(string $htmlBody): void
    {
        $this->htmlBody = $htmlBody;
    }
}
