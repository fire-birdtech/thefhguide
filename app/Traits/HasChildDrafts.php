<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasChildDrafts
{
    public function childDrafts(): MorphMany
    {
        return $this->morphMany(Draft::class, 'parentable');
    }
}