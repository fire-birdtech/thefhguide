<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Parental\HasParent;

class ProjectPage extends Page
{
    use HasParent;

    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }
}
