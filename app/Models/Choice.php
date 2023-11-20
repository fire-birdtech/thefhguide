<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Choice extends Model
{
    use HasFactory, HasRevisions, SoftDeletes;

    protected static function booted(): void
    {
        static::creating(function ($choice) {
            $choice->order = count($choice->goal->choices) + 1;
        });
    }

    protected $guarded = ['id'];

    protected $dontKeepRevisionOf = ['locked'];

    protected $casts = [
        'content' => 'array',
        'locked' => 'boolean',
    ];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function resourceLinks(): BelongsToMany
    {
        return $this->belongsToMany(ResourceLink::class);
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
