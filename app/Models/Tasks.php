<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tasks extends Model
{
    protected $table = 'tasks';

    public function user(): BelongsToMany
    {
        return $this->belongsToMany('user_id');
    }
}
