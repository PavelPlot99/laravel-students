<?php

namespace App\Http\Resources\Lecture;

use App\Http\Resources\Group\GroupResource;
use App\Http\Resources\Theme\ThemeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
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
            'theme_id' => $this->theme_id,
            'theme' => ThemeResource::make($this->theme),
            'group_id' => $this->group_id,
            'group' => GroupResource::make($this->group),
        ];
    }
}
