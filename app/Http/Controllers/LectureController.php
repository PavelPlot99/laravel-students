<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lecture\StoreLectureRequest;
use App\Http\Requests\Lecture\UpdateLectureRequest;
use App\Http\Resources\Lecture\LectureResource;
use App\Http\Resources\Lecture\ListLectureResource;
use App\Models\Lecture;
use App\Services\LectureService;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\JsonResponse;

class LectureController extends Controller
{
    public function index(): JsonResource
    {
        $lectures = Lecture::query()->get();

        return ListLectureResource::collection($lectures);
    }

    public function show(Lecture $lecture): LectureResource
    {
        return LectureResource::make($lecture);
    }

    public function store(StoreLectureRequest $request, LectureService $lectureService): ListLectureResource|JsonResponse
    {
        return $lectureService->createLecture($request->validated());
    }

    public function update(UpdateLectureRequest $request, Lecture $lecture): ListLectureResource
    {
        $lecture->update($request->validated());

        return ListLectureResource::make($lecture);
    }

    public function destroy(Lecture $lecture): ListLectureResource
    {
        $lecture->delete();

        return ListLectureResource::make($lecture);
    }
}
