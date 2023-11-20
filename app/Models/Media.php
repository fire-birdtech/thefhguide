<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'name',
        'path',
        'uploaded_by_user_id',
    ];

    protected $appends = [
        'url',
    ];

    protected $casts = [
        'created_at' => 'datetime:F j, Y',
        'updated_at' => 'datetime:F j, Y',
    ];

    public function getUrlAttribute(): ?string
    {
        return $this->path
            ? Storage::disk('public')->url($this->path)
            : null;
    }

    public function choices(): MorphToMany
    {
        return $this->morphedByMany(Choice::class, 'mediaable');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'uploaded_by_user_id');
    }
}
