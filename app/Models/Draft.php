<?php

namespace App\Models;

use App\Traits\HasCoverImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Draft extends Model
{
    use HasCoverImage, HasFactory;

    protected $guarded = ['id'];

    protected $appends = [
        'cover_image_url',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parentable(): MorphTo
    {
        return $this->morphTo();
    }
}
