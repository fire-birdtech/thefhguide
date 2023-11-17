<?php

namespace App\Models;

use App\Traits\HasChildDrafts;
use App\Traits\HasCoverImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Venturecraft\Revisionable\RevisionableTrait as HasRevisions;

class Project extends Model
{
    use HasChildDrafts, HasCoverImage, HasFactory, HasRevisions, HasSlug, SoftDeletes;

    protected static function booted(): void
    {
        static::creating(function ($project) {
            $project->order = count($project->collection->projects) + 1;
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

    protected $appends = [
        'cover_image_url',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function goals(): HasMany
    {
        return $this->hasMany(Goal::class);
    }
}
