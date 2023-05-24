<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Requests\Lecture\UpdateLectureRequest;
use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Group\ListGroupResource;
use App\Http\Resources\Group\LectureResource;
use App\Models\Group;
use App\Query\GroupQuery;
use App\Services\GroupService;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupController extends Controller
{
    public function index(): JsonResource
    {
        $groups = Group::query()->with('students')->get();

        return ListGroupResource::collection($groups);
    }

    public function show(Group $group): GroupResource
    {
        return GroupResource::make($group);
    }

    public function showLectures(Group $group): LectureResource
    {
        return LectureResource::make($group);
    }

    public function store(GroupRequest $request, GroupQuery $groupQuery): ListGroupResource
    {
        $group = $groupQuery->store($request->get('title'));

        return ListGroupResource::make($group);
    }

    public function updateLecture(UpdateLectureRequest $request, Group $group, GroupService $groupService): LectureResource
    {
        $data = $request->validated();
        return LectureResource::make($groupService->updateGroup($group, $data));
    }

    public function update(UpdateGroupRequest $request, Group $group): JsonResource
    {
        $group->update($request->validated());

        return ListGroupResource::make($group);
    }

    public function destroy(Group $group): ListGroupResource
    {
        $group->delete();

        return ListGroupResource::make($group);
    }
}
