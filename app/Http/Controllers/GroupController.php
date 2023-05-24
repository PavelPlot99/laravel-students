<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Group\ListGroupResource;
use App\Http\Resources\Group\SyllabusResource;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

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

    public function showSyllabus(Group $group)
    {
        return SyllabusResource::make($group);
    }

    public function store(GroupRequest $request): ListGroupResource
    {
        $group = Group::query()->create($request->validated());

        return ListGroupResource::make($group);
    }

    public function update(UpdateGroupRequest $request, Group $group, GroupService $groupService): SyllabusResource
    {
        $data = $request->validated();

        return SyllabusResource::make($groupService->updateGroup($group, $data));
    }

    public function destroy(Group $group): ListGroupResource
    {
        $group->delete();

        return ListGroupResource::make($group);
    }
}
