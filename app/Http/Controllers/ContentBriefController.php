<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ContentBriefController extends Controller
{
     public function create() {
        return Inertia::render('Document/Content/Create');
     }
}
