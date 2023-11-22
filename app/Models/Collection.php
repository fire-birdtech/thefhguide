<?php

namespace App\Models;

use App\Enums\CollectionType;
use App\Traits\HasChildDrafts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Collection extends Model
{
    use HasChildDrafts, HasFactory, HasRevisions, HasSlug, SoftDeletes;

    protected $guarded = ['id'];

    protected $dontKeepRevisionOf = ['locked'];

    protected $casts = [
        'locked' => 'boolean',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function projects(): HasMany
    {
        return $this->HasMany(Project::class);
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    public function scopeProjectCollections(Builder $query): void
    {
        $query->where('type', CollectionType::PROJECT);
    }

    public function scopePageCollections(Builder $query): void
    {
        $query->where('type', CollectionType::PAGE);
    }
}
