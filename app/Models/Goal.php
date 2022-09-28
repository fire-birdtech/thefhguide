<?php

namespace App\Models;

use App\Traits\Draftable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Goal extends Model
{
    use Draftable, HasFactory, HasRevisions, HasSlug;

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

    public function assignments(): MorphMany
    {
        return $this->morphMany(Assignment::class, 'assignable');
    }

    public function draft(): MorphOne
    {
        return $this->morphOne(Draft::class, 'draftable');
    }
}
