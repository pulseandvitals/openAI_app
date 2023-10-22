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
            ->orderBy('position_order')
            ->get();

         $title = File::query()
            ->where('id',$heading)
            ->first();

         $collection = collect($headings);
         $data = $collection->implode('html_format', '<br>');

         return Inertia::render('Document/Content/Create',[
            'selectedHeadings' => $headings,
            'editableHeadings' => $data,
            'titleHeading' => '<h1>'.Str::title($title->sub_topic_4).'</h1>'
        ]);
     }

     public function destroy($heading)
     {
       Heading::find($heading)->delete();
       return redirect()->back()->with('message','Successfully deleted.');
     }
}
