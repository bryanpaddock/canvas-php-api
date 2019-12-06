<?php

namespace Valenture\CanvasApi\Modules\Users\Factories;

use Exception;
use Valenture\CanvasApi\Modules\Users\Objects\Profile;
use Valenture\CanvasApi\Modules\Users\Objects\User;

/**
 * Class UserFactory
 *
 * Responsible for building a Profile from the API response
 *
 * @package Valenture\CanvasApi\Modules\Users\Factories
 */
final class ProfileFactory
{
    /**
     * Builds a User object from the json data provided
     * 
     * @param $jsonData
     * @return Profile
     */
    public static function make($jsonData): Profile
    {
        $response = new Profile($jsonData->id, $jsonData->name);

        // Not all the fields are returned sometimes (eg Admins)

        if (isset($jsonData->short_name)) {
            $response->setShortName($jsonData->short_name);
        }

        if (isset($jsonData->sortable_name)) {
            $response->setSortableName($jsonData->sortable_name);
        }

        if (isset($jsonData->title)) {
            $response->setTimeZone($jsonData->title);
        }

        if (isset($jsonData->bio)) {
            $response->setBio($jsonData->bio);
        }

        if (isset($jsonData->primary_email)) {
            $response->setPrimaryEmail($jsonData->primary_email);
        }

        if (isset($jsonData->login_id)) {
            $response->setLoginId($jsonData->login_id);
        }

        if (isset($jsonData->sis_user_id)) {
            $response->setSisUserId($jsonData->sis_user_id);
        }

        if (isset($jsonData->lti_user_id)) {
            $response->setLtiUserId($jsonData->lti_user_id);
        }

        if (isset($jsonData->avatar_url)) {
            $response->setAvatarUrl($jsonData->avatar_url);
        }

        if (isset($jsonData->calendar)) {
            $response->setCalendar($jsonData->calendar);
        }

        if (isset($jsonData->time_zone)) {
            $response->setTimeZone($jsonData->time_zone);
        }

        if (isset($jsonData->locale)) {
            $response->setLocale($jsonData->locale);
        }

        return $response;
    }

    /**
     * Builds a collection of Profiles
     *
     * @param string $rawData
     * @return Profile[]
     * @throws Exception
     */
    public static function makeCollection(string $rawData): array
    {
        $jsonData = json_decode($rawData);
        if ($jsonData === null) {
            throw new Exception('Invalid JSON provided');
        }

        $users = [];

        foreach ($jsonData as $jsonRow) {
            $users[] = self::make($jsonRow);
        }

        return $users;
    }
}