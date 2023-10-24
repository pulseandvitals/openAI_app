<?php

namespace App\Http\Controllers;

use App\Http\Requests\Heading\StoreAdditionalInformationRequest;
use App\Models\File;
use Inertia\Inertia;
use App\Models\Heading;
use App\Models\HeadingInformation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContentBriefController extends Controller
{
     public function create($heading) {
         $headings = Heading::query()
            ->with('informations')
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

     public function update(Request $request,Heading $heading)
    {
      $heading->update([
         'heading_title' => $request->heading_title,
         'heading_type' => $request->heading_type,
         'html_format' => '<'.$request->heading_type.'>'.$request->heading_title.'</'.$request->heading_type.'>'
      ]);

      return redirect()->back()->with('message','Successfully edited.');
    }

    public function store(StoreAdditionalInformationRequest $request)
    {
      HeadingInformation::create([
         'user_id' => auth()->id(),
         'heading_id' => $request->heading_id,
         'additional_information' => $request->additional_information
      ]);

      return redirect()->back()->with('message','Successfully added.');
    }
    public function destroyInformation($information)
    {
      HeadingInformation::find($information)->delete();
      return redirect()->back()->with('message','Successfully deleted the information.');
    }
}
