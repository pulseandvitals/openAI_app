<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Heading;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContentBriefController extends Controller
{
     public function create($heading) {
         $headings = Heading::query()
            ->where([
               'user_id' => auth()->id(),
               'heading_id' => $heading
            ])
            ->get();
         $title = File::query()
               ->where('id',$heading)
               ->first();

         return Inertia::render('Document/Content/Create',[
            'selectedHeadings' => $headings,
            'titleHeading' => '<h1>'.Str::title($title->sub_topic_4).'</h1>'
        ]);
     }
}
