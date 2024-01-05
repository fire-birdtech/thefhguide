<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Parental\HasChildren;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasChildren, HasFactory, HasSlug;

    protected $fillable = [
        'collection_id',
        'hero',
        'name',
        'type',
    ];

    protected $casts = [
        'content' => 'array',
        'hero' => 'array',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
    }

    public function getRouteKeyName(): string
    {
        return 'uri';
    }

    public static function booted()
    {
        static::creating(function (Page $page) {
            $page->uri = $page->generateUri();
        });
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function generateUri()
    {
        return $this->collection->slug . $this->slug;
    }
}
