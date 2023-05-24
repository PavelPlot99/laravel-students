<?php
namespace App\Services;

use App\Http\Resources\Lecture\ListLectureResource;
use App\Models\Lecture;
use Illuminate\Http\JsonResponse;

class LectureService
{
    public function createLecture($data):ListLectureResource|JsonResponse
    {
        $lectureFromDb = Lecture::query()->where('theme_id', $data['theme_id'])->where('group_id', $data['group_id'])->first();
        if(!$lectureFromDb){
            return ListLectureResource::make(Lecture::query()->create($data));
        }
        return response()->json(['message' => 'Такая лекция уже существует'], 422);
    }
}
