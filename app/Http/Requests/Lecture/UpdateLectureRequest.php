<?php

namespace App\Http\Requests\Lecture;

use App\Models\Theme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLectureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'themes' => 'array',
            'themes.*' => [Rule::exists(Theme::class, 'id')]
        ];
    }
}
