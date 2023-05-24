<?php

namespace App\Http\Resources\Group;

use App\Http\Resources\Lecture\ListLectureResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SyllabusResource extends JsonResource
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
            'themes' => $this->themes
        ];
    }
}
