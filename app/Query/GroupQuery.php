<?php

namespace App\Query;

use App\Models\Group;

class GroupQuery
{
    public function store(string $title): Group
    {
        return Group::query()->create([
            'title' => $title
        ]);
    }
}
