<?php

namespace Valenture\CanvasApi\Modules\Courses\Factories;

use Valenture\CanvasApi\Modules\Courses\Objects\Course;

final class CourseFactory
{
    public static function make($jsonData): Course
    {
        $response = new Course();

        $response->setId($jsonData->id);
        $response->setName($jsonData->name);
        $response->setUuid($jsonData->uuid);
        $response->setCourseCode($jsonData->course_code);

        return $response;
    }

    /**
     * @param $rawBody
     *
     * @return Course[]
     */
    public static function makeCollection($rawBody): array
    {
        $json = json_decode($rawBody, false);

        $courses = [];

        foreach ($json as $item) {
            $courses[] = self::make($item);
        }

        return $courses;
    }
}
