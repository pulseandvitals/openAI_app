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

    public function show($keyword)
    {
        $content = file_get_contents(public_path('/temp_data/output2.json'));
        if(!empty($content)) {
            $json = json_decode($content, true);
            $data = collect($json['SERP_Data']);
            $getFirstId = File::where('sub_topic_4',$keyword)->first();
            $heading = File::find($getFirstId->id);
        }
        $getFirstId = File::where('sub_topic_4',$keyword)->first();
        $heading = File::find($getFirstId->id);

        return Inertia::render('Document/Heading/Show', [
            'heading' => $heading,
            'extractedData' => [
                'query' =>  $data['Query'] ?? null,
                'serps' =>  $data ?? null,
            ]
        ]);
    }
    public function extractJson(Request $request,$keyword)
    {
        $request->validate([
            'url' => 'required|mimes:json'
        ]);
        $originalName = $request->url->getClientOriginalExtension();
        $request->image->move(public_path('temp_date'), $originalName);

        return redirect()->back()->with('message','Extracted temporary data.');
    }

    public function store($heading,$selected, StoreSelectedHeadingService $storeSelectedHeadingService)
    {
        $selectedHeading = json_decode($selected,true);
        $storeSelectedHeadingService->execute($heading,$selectedHeading,auth()->id());

        return redirect()->back()->with('message','Saved.');
    }
    public function redirectPage($weburl)
    {
        return redirect($weburl);
    }
}
