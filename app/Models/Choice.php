<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Choice extends Model
{
    use HasFactory, HasRevisions, SoftDeletes;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($choice) {
            $choice->order = count($choice->goal->choices) + 1;
        });
    }

    protected $guarded = ['id'];

    protected $dontKeepRevisionOf = ['locked'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'content' => 'array',
        'locked' => 'boolean',
    ];

    /**
     * The method for retrieving the goal which the model belongs to
     */
    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function resourceLinks(): BelongsToMany
    {
        return $this->belongsToMany(ResourceLink::class);
    }
}
