<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function students():HasMany
    {
        return $this->hasMany(Student::class, 'group_id', 'id');
    }

    public function lectures():HasMany
    {
        return $this->hasMany(Lecture::class, 'group_id', 'id');
    }
}
