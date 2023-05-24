<?php

namespace App\Http\Controllers;

use App\Http\Requests\Theme\StoreThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;
use App\Http\Resources\Theme\ThemeResource;
use App\Models\Theme;
use Illuminate\Http\Resources\Json\JsonResource;

class ThemeController extends Controller
{
    public function index(): JsonResource
    {
        $themes = Theme::query()->get();

        return ThemeResource::collection($themes);
    }

    public function show(Theme $theme): ThemeResource
    {
        return ThemeResource::make($theme->load('groups.students'));
    }

    public function store(StoreThemeRequest $request): ThemeResource
    {
        $theme = Theme::query()->create($request->validated());

        return ThemeResource::make($theme);
    }

    public function update(UpdateThemeRequest $request, Theme $theme): ThemeResource
    {
        $theme->update($request->validated());

        return ThemeResource::make($theme);
    }

    public function destroy(Theme $theme): ThemeResource
    {
        $theme->delete();

        return ThemeResource::make($theme);
    }
}
