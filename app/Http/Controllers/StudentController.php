<?php

namespace App\Http\Controllers;

use App\Dto\Student\StoreStudentDto;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\Student\ListStudentResource;
use App\Http\Resources\Student\StudentResource;
use App\Models\Student;
use App\Query\StudentQuery;
use Illuminate\Http\Resources\Json\JsonResource;


class StudentController extends Controller
{
    public function __construct(
        private StudentQuery $studentQuery
    )
    {
    }

    public function index(): JsonResource
    {
        return ListStudentResource::collection(Student::query()->get());
    }

    public function show(Student $student): StudentResource
    {
        return StudentResource::make($student);
    }

    public function store(StoreStudentRequest $request): ListStudentResource
    {
        $student = $this->studentQuery->store(new StoreStudentDto(
            $request->get('name'),
            $request->get('email'),
            $request->get('group_id'),
        ));

        return ListStudentResource::make($student);
    }

    public function update(UpdateStudentRequest $request, Student $student): ListStudentResource
    {
        $student->update($request->validated());

        return ListStudentResource::make($student);
    }

    public function destroy(Student $student): ListStudentResource
    {
        $student->delete();

        return ListStudentResource::make($student);
    }
}
