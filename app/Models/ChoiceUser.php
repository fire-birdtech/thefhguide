<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ChoiceUser extends Pivot
{
    protected $fillable = [
        'choice_id',
        'user_id',
        'notes',
        'status',
    ];
}
