<?php

namespace App\Http\Resources\Group;

use App\Http\Resources\Theme\ThemeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'themes' => ThemeResource::collection($this->themes),
        ];
    }
}
