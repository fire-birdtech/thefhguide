<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(string $page)
    {
        return Page::where('uri', $page)->first();
    }
}
