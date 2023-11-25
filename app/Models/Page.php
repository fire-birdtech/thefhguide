<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parental\HasChildren;

class Page extends Model
{
    use HasChildren, HasFactory;

    protected $fillable = [
        'collection_id',
        'name',
        'type',
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function getRouteKeyName(): string
    {
        return 'uri';
    }
}
