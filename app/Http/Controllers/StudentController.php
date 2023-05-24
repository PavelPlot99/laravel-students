<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\Student\ListStudentResource;
use App\Http\Resources\Student\StudentResource;
use App\Models\Student;
use Illuminate\Http\Resources\Json\JsonResource;


class StudentController extends Controller
{
    public function index(): JsonResource
    {
        $students = Student::query()->with('group.themes')->get();

        return ListStudentResource::collection($students);
    }

    public function show(Student $student): StudentResource
    {
        return StudentResource::make($student);
    }

    public function store(StoreStudentRequest $request): ListStudentResource
    {
        $student = Student::query()->create($request->validated());

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
