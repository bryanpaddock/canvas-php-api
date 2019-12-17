<?php

namespace Valenture\CanvasApi\Modules\Comms\Factories;

use DateTime;
use Valenture\CanvasApi\Modules\Comms\Enums\CommWorkflowStateEnum;
use Valenture\CanvasApi\Modules\Comms\Objects\CommMessage;

/**
 * Class CommMessageFactory
 *
 * Builds a CommMessage from the API request data
 *
 * @package Valenture\CanvasApi\Modules\Comms\Factories
 */
final class CommMessageFactory
{
    /**
     * @param $requestData
     * @return CommMessage
     */
    public static function make($requestData): CommMessage
    {
        $return = new CommMessage();

        $return->setId($requestData->id);
        $return->setCreatedAt(DateTime::createFromFormat('c', $requestData->created_at));
        $return->setSentAt(DateTime::createFromFormat('c', $requestData->sent_at));
        $return->setWorkflowState(CommWorkflowStateEnum::make($requestData->workflow_state));
        $return->setFrom($requestData->from);
        $return->setFromName($requestData->from_name);
        $return->setTo($requestData->to);
        $return->setReplyTo($requestData->reply_to);
        $return->setSubject($requestData->subject);
        $return->setBody($requestData->body);
        $return->setHtmlBody($requestData->html_body);

        return $return;
    }

    /**
     * @param array $requestData
     * @return CommMessage[]
     */
    public static function makeCollection(array $requestData): array
    {
        $return = [];
        foreach($requestData as $requestDatum) {
            $return[] = self::make($requestDatum);
        }

        return $return;
    }
}