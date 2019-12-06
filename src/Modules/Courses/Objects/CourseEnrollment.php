<?php

namespace Valenture\CanvasApi\Modules\Courses\Objects;

use Valenture\CanvasApi\Enums\EnrollmentState;
use Valenture\CanvasApi\Enums\EnrollmentType;

/**
 * Class CourseEnrollment
 *
 * Represents a users enrollment to a specific course
 *
 * @package Valenture\CanvasApi\Modules\Courses\Objects
 */
final class CourseEnrollment
{
    /**
     * The ID of the user to be enrolled in the course.
     *
     * @var string
     */
    private $userId;

    /**
     * Enroll the user as a student, teacher, TA, observer, or designer. If no value is given, the type will be inferred by enrollment if supplied, otherwise 'StudentEnrollment' will be used.
     *
     * Allowed values: StudentEnrollment, TeacherEnrollment, TaEnrollment, ObserverEnrollment, DesignerEnrollment
     *
     * @var EnrollmentType
     */
    private $type;

    /**
     * @var int Assigns a custom course-level role to the user.
     */
    private $roleId;

    /**
     * If set to 'active,' student will be immediately enrolled in the course. Otherwise they will be required to accept a course invitation. Default is 'invited.'.
     * If set to 'inactive', student will be listed in the course roster for teachers, but will not be able to participate in the course until their enrollment is activated.
     *
     * Allowed values: active, invited, inactive
     *
     * @var EnrollmentState
     */
    private $enrollmentState;

    /**
     * If true, a notification will be sent to the enrolled user. Notifications are not sent by default.
     *
     * @var bool
     */
    private $notify;

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param EnrollmentType $type
     */
    public function setType(EnrollmentType $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     */
    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    /**
     * @return string
     */
    public function getEnrollmentState(): string
    {
        return $this->enrollmentState;
    }

    /**
     * @param EnrollmentState $enrollmentState
     */
    public function setEnrollmentState(EnrollmentState $enrollmentState): void
    {
        $this->enrollmentState = $enrollmentState;
    }

    /**
     * @return bool
     */
    public function isNotify(): bool
    {
        return $this->notify;
    }

    /**
     * @param bool $notify
     */
    public function setNotify(bool $notify): void
    {
        $this->notify = $notify;
    }

    /**
     * Returns the array representation as expected by Canvas
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'type' => $this->type,
            'role_id' => $this->roleId,
            'enrollment_state' => $this->enrollmentState,
            'notify' => $this->notify
        ];
    }
}
