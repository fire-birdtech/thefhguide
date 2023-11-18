<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'name',
        'path',
    ];

    public static function createMedia(string|UploadedFile $file): self
    {
        dd(pathinfo($file, PATHINFO_FILENAME));
    }
}
