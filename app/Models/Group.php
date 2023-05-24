<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function students():HasMany
    {
        return $this->hasMany(Student::class, 'group_id', 'id');
    }

    public function themes():BelongsToMany
    {
        return $this->belongsToMany(Theme::class, 'lectures', 'group_id', 'theme_id')->withPivot('order');
    }
}
