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

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($goal) {
            $goal->order = count($goal->project->goals) + 1;
        });
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $guarded = ['id'];

    protected $dontKeepRevisionOf = ['locked'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'locked' => 'boolean',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * The method to retrieve the choices that belong to the model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }

    public function assignment(): MorphOne
    {
        return $this->morphOne(Assignment::class, 'assignable');
    }
}
