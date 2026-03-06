<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;

class ReportsController extends Controller
{
    public function index(): Response
    {
        return inertia('Reports/Index', []);
    }
}
