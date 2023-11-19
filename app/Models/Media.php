<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'name',
        'path',
    ];

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute(): ?string
    {
        return $this->path
            ? Storage::disk('public')->url($this->path)
            : null;
    }
}
