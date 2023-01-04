<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'choice_id'
    ];

    public function choice(): BelongsTo
    {
        return $this->belongsTo(Choice::class);
    }
}
