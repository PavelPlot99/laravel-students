<?php

namespace App\Query;

use App\Dto\Student\StoreStudentDto;
use App\Models\Student;

class StudentQuery
{
    public function store(StoreStudentDto $createStudentDto): Student
    {
        return Student::query()->create([
            'name' => $createStudentDto->name,
            'email' => $createStudentDto->email,
            'group_id' => $createStudentDto->groupId,
        ]);
    }
}
