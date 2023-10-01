<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Heading;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HeadingController extends Controller
{

    public function show($keyword)
    {

        $getFirstId = File::where('sub_topic_4',$keyword)->first();
        $heading = File::find($getFirstId->id);

        return Inertia::render('Document/Heading/Show', [
            'heading' => [
                'keyword' => '<h1>'. Str::ucfirst($heading->sub_topic_4) .'</h1>',
            ]
        ]);
    }
}
