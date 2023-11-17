<?php

namespace App\Models;

use App\Traits\HasChildDrafts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Goal extends Model
{
    use HasChildDrafts, HasFactory, HasRevisions, HasSlug, SoftDeletes;

    protected static function booted(): void
    {
        static::creating(function ($goal) {
            $goal->order = count($goal->project->goals) + 1;
        });
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
    }

    protected $guarded = ['id'];

    protected $dontKeepRevisionOf = ['locked'];

    protected $casts = [
        'locked' => 'boolean',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }

    public function assignment(): MorphOne
    {
        return $this->morphOne(Assignment::class, 'assignable');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
