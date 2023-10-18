<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Heading;
use App\Services\Heading\StoreSelectedHeadingService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HeadingController extends Controller
{

    public function show(Request $request,$keyword)
    {
        $getFirstId = File::where('sub_topic_4',$keyword)->first();
        $heading = File::find($getFirstId->id);

        return Inertia::render('Document/Heading/Show', [
            'heading' => $heading,
            'extractedData' => [
                'query' =>  null,
                'serps' =>  null,
            ]
        ]);
    }
    public function extractJson(Request $request,$keyword)
    {
        $request->validate([
            'url' => 'required|mimes:json'
        ]);
        $getFirstId = File::where('sub_topic_4',$keyword)->first();
        $heading = File::find($getFirstId->id);
        $file = $request->url;
        $content = file_get_contents($file);
        $json = json_decode($content, true);
        $data = collect($json['SERP_Data']);

        return Inertia::render('Document/Heading/Show', [
            'heading' => $heading,
            'extractedData' => [
                'query' => $json['Query'] ? $json['Query'] : null,
                'serps' => $data ? $data : null,
            ]
        ]);
    }

    public function store($heading,$selected, StoreSelectedHeadingService $storeSelectedHeadingService)
    {
        $selectedHeading = json_decode($selected,true);
        $storeSelectedHeadingService->execute($heading,$selectedHeading,auth()->id());

        return redirect()->route('document.content-brief.create',$heading)->with([
            'message' => 'Successfully generated the headings.',
            'heading_id' => $heading
        ]);
    }
}
