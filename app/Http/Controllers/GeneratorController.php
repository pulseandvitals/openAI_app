<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Generator/Index', [
            'content' => $request->content ?? ''
        ]);
    }
    public function generateContent(Request $request)
    {
        dd($request->all());
    }
}
