<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class InfoPage extends Page
{
    use HasFactory, HasParent;

    public static function booted(): void
    {
        static::creating(function (Page $page) {
            $page->uri = $page->generateUri();
        });
    }

    public function generateUri(): string
    {
        return $this->collection->slug . '/' . $this->slug;
    }
}
