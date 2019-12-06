<?php

namespace Valenture\CanvasApi\Modules\Users\Factories;

use Exception;
use Valenture\CanvasApi\Modules\Users\Objects\User;

/**
 * Class UserFactory
 *
 * Responsible for building User(s) from the API response
 *
 * @package Valenture\CanvasApi\Modules\Users\Factories
 */
final class UserFactory
{
    /**
     * Builds a User object from the json data provided
     * 
     * @param $jsonData
     * @return User
     */
    public static function make($jsonData): User
    {
        $response = new User($jsonData->id, $jsonData->name);

        // Not all the fields are returned sometimes (eg Admins)

        if (isset($jsonData->sortable_name)) {
            $response->setSortableName($jsonData->sortable_name);
        }

        if (isset($jsonData->sis_user_id)) {
            $response->setSisUserId($jsonData->sis_user_id);
        }

        if (isset($jsonData->sis_import_id)) {
            $response->setSisImportId($jsonData->sis_import_id);
        }

        if (isset($jsonData->integration_id)) {
            $response->setIntegrationId($jsonData->integration_id);
        }

        if (isset($jsonData->login_id)) {
            $response->setLoginId($jsonData->login_id);
        }

        if (isset($jsonData->avatar_url)) {
            $response->setAvatarUrl($jsonData->avatar_url);
        }

        if (isset($jsonData->enrollments)) {
            $response->setEnrollments($jsonData->enrollments);
        }

        if (isset($jsonData->email)) {
            $response->setEmail($jsonData->email);
        }

        if (isset($jsonData->locale)) {
            $response->setLocale($jsonData->locale);
        }

        if (isset($jsonData->last_login)) {
            $response->setLastLogin($jsonData->last_login);
        }

        if (isset($jsonData->time_zone)) {
            $response->setTimezone($jsonData->time_zone);
        }

        if (isset($jsonData->bio)) {
            $response->setBio($jsonData->bio);
        }

        return $response;
    }

    /**
     * Builds a collection of Users
     *
     * @param string $rawData
     * @return User[]
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