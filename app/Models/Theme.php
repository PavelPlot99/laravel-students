<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'descriptiom'
    ];

    protected $guarded = [
        'id'
    ];

    public function lectures():HasMany
    {
        return $this->hasMany(Lecture::class, 'group_id', 'id');
    }
}
