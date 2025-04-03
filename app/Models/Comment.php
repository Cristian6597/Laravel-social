<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    //
    protected $fillable = [
        'comment',

    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
