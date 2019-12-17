<?php

namespace Valenture\CanvasApi\Modules\Conversations\Objects;

final class ConversationProperties
{
    /**
     * Current user is the last author
     *
     * @var bool
     */
    private $lastAuthor;

    /**
     * Conversation has attachments
     *
     * @var bool
     */
    private $attachments;

    /**
     * Conversation has media objects
     *
     * @var bool
     */
    private $mediaObjects;

    /**
     * @return bool
     */
    public function isLastAuthor(): bool
    {
        return $this->lastAuthor;
    }

    /**
     * @param bool $lastAuthor
     */
    public function setLastAuthor(bool $lastAuthor): void
    {
        $this->lastAuthor = $lastAuthor;
    }

    /**
     * @return bool
     */
    public function isAttachments(): bool
    {
        return $this->attachments;
    }

    /**
     * @param bool $attachments
     */
    public function setAttachments(bool $attachments): void
    {
        $this->attachments = $attachments;
    }

    /**
     * @return bool
     */
    public function isMediaObjects(): bool
    {
        return $this->mediaObjects;
    }

    /**
     * @param bool $mediaObjects
     */
    public function setMediaObjects(bool $mediaObjects): void
    {
        $this->mediaObjects = $mediaObjects;
    }
}