<?php

namespace App\Models;

use App\Traits\Draftable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Choice extends Model
{
    use Draftable, HasFactory, HasRevisions, SoftDeletes;

    protected $guarded = ['id'];

    protected $dontKeepRevisionOf = ['locked'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'locked' => 'boolean'
    ];

    /**
     * The method for retrieving the goal which the model belongs to
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function draft(): MorphOne
    {
        return $this->morphOne(Draft::class, 'draftable');
    }
}
