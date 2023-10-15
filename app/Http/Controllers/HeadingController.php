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
                'keyword' => Str::ucfirst($heading->sub_topic_4)
            ],
            'extractedData' => [
                'query' => null,
                'serps' => null,
            ]
        ]);
    }
    public function extractJson(Request $request,$keyword)
    {
        $file = $request->url;
        $content = file_get_contents($file);
        $json = json_decode($content, true);
        $getFirstId = File::where('sub_topic_4',$keyword)->first();
        $heading = File::find($getFirstId->id);
        $data = collect($json['SERP_Data']);
        return Inertia::render('Document/Heading/Show', [
            'heading' => [
                'keyword' => Str::ucfirst($heading->sub_topic_4)
            ],
            'extractedData' => [
                'query' => $json['Query'] ? $json['Query'] : null,
                'serps' => $data ? $data : null,
            ]
        ]);
    }
}
