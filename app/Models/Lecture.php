<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
      'theme_id',
      'group_id',
    ];

    protected $guarded = [
        'id'
    ];

    public function theme():BelongsTo
    {
        return $this->belongsTo(Theme::class, 'theme_id', 'id');
    }

    public function group():BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
