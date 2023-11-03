<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Parental\HasParent;

class GoalPage extends Page
{
    use HasFactory, HasParent;

    public function goal(): HasOne
    {
        return $this->hasOne(Goal::class);
    }
}
