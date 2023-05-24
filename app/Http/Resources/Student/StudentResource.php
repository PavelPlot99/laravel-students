<?php

namespace App\Http\Resources\Student;

use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Group\SyllabusResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'group_id' => $this->group_id,
            'group' => SyllabusResource::make($this->group),
        ];
    }
}
