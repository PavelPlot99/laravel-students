<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupRequest;
use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Group\ListGroupResource;
use App\Http\Resources\Group\SyllabusResource;
use App\Models\Group;
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

    public function showSyllabus(Group $group){
        return SyllabusResource::make($group);
    }

    public function store(GroupRequest $request):GroupResource
    {
        $group = Group::query()->create($request->validated());

        return GroupResource::make($group);
    }

    public function update(GroupRequest $request, Group $group):GroupResource
    {
        $group->update($request->validated());

        return GroupResource::make($group);
    }

    public function createOrUpdateSyllabus()
    {

    }

    public function destroy(Group $group):GroupResource
    {
        $group->delete();

        return GroupResource::make($group);
    }
}
