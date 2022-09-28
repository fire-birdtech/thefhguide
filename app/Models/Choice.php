<?php

namespace App\Models;

use App\Traits\Draftable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Choice extends Model
{
    use Draftable, HasFactory, HasRevisions;

    protected $guarded = ['id'];

    /**
     * The method for retrieving the goal which the model belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function assignments(): MorphMany
    {
        return $this->morphMany(Assignment::class, 'assignable');
    }

    public function draft(): MorphOne
    {
        return $this->morphOne(Draft::class, 'draftable');
    }
}
