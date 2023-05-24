<?php

namespace App\Http\Resources\Group;

use App\Http\Resources\Student\ListStudentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'students' => ListStudentResource::collection($this->students),
        ];
    }
}
