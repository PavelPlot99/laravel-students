<?php
namespace App\Services;

use App\Http\Resources\Lecture\ListLectureResource;
use App\Models\Group;
use App\Models\Lecture;
use App\Models\Theme;
use Illuminate\Http\JsonResponse;

class GroupService
{
    public function updateGroup($group, $data):Group
    {
        if(isset($data['group'])){
            $group->update($data['group']);
        }
        if(isset($data['themes'])){
            $group->themes()->sync($data['themes']);
        }

        return $group;
    }
}
