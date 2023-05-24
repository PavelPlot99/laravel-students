<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'description'
    ];

    protected $guarded = [
        'id'
    ];

    public function groups():BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'lecture', 'group_id', 'theme_id');
    }
}
