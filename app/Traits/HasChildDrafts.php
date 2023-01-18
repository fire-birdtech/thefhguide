<?php

namespace App\Traits;

use App\Models\Draft;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasChildDrafts
{
    public function childDrafts(): MorphMany
    {
        return $this->morphMany(Draft::class, 'parentable');
    }
}