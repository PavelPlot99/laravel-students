<?php

namespace App\Dto\Student;

class StoreStudentDto
{
    public function __construct(
        public string /*readonly*/ $name,
        public string /*readonly*/ $email,
        public ?int /*readonly*/ $groupId,
    )
    {
    }
}
