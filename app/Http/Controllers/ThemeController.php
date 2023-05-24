<?php

namespace App\Http\Controllers;

use App\Http\Requests\Theme\StoreThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;
use App\Http\Resources\Theme\ThemeResource;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::query()->get();

        return ThemeResource::collection($themes);
    }

    public function show(Theme $theme)
    {
        return ThemeResource::make($theme);
    }

    public function store(StoreThemeRequest $request)
    {
        $theme = Theme::query()->create($request->validated());

        return ThemeResource::make($theme);
    }

    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        $theme->update($request->validated());

        return ThemeResource::make($theme);
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();

        return ThemeResource::make($theme);
    }
}
