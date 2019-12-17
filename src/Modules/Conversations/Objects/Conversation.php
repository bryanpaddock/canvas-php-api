<?php

namespace Valenture\CanvasApi\Modules\Conversations\Objects;

use DateTime;

final class Conversation
{
    /**
     * @var string The unique identifier for the conversation.
     */
    private $id;

    /**
     * @var string The subject of the conversation.
     */
    private $subject;

    /**
     * @var string The current state of the conversation (read, unread or archived)
     */
    private $workflowState;

    /**
     * A <=100 character preview from the most recent message
     *
     * @var string
     */
    private $lastMessage;

    /**
     * The timestamp of the latest message
     *
     * @var DateTime
     */
    private $lastMessageAt;

    /**
     * The number of messages in this conversation
     *
     * @var int
     */
    private $messageCount;

    /**
     * Indicates whether the user is actively subscribed to the conversation
     *
     * @var bool
     */
    private $subscribed;

    /**
     * Indicates whether this is a private conversation (i.e. audience of one)
     *
     * @var bool
     */
    private $private;

    /**
     * Whether the conversation is starred
     *
     * @var bool
     */
    private $starred;

    /**
     * @var ConversationProperties
     */
    private $properties;

    /**
     * Array of user ids who are involved in the conversation, ordered by participation level, then alphabetical. Excludes current user, unless this is a monologue.
     *
     * @var int[]
     */
    private $audience;

    /**
     * Most relevant shared contexts (courses and groups) between current user and other participants. If there is only one participant, it will also include that user's enrollment(s)/ membership type(s) in each course/group
     */
    private $audienceContexts;

    /**
     * URL to appropriate icon for this conversation (custom, individual or group avatar, depending on audience)
     *
     * @var string
     */
    private $avatarUrl;

    /**
     * @var
     */
    private $participants;
}