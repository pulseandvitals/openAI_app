<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Document;
use App\Models\File;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\DocumentResource;
use App\Http\Requests\Document\DocumentRequest;
use App\Http\Requests\Document\FileUpdateRequest;
use App\Services\Document\StoreDocumentService;
use App\Services\Document\GenerateDocumentService;

class DocumentController extends Controller
{

    public function index()
    {
        return Inertia::render('Document/Index', [
            'documents' => DocumentResource::collection(Document::query()
                ->with('user')
                ->where('user_id', auth()->id())
                ->orderBy('created_at','DESC')
                ->paginate(10)
                )
        ]);
    }

    public function create()
    {
        return Inertia::render('Document/Create');
    }

    public function store(DocumentRequest $request, StoreDocumentService $document)
    {
        $doc = $document->execute($request->validated(),auth()->id());
        if(!empty($doc)) {
            $document_id = $doc->id;
            $user = auth()->id();
            Excel::import(new DataImport($document_id,$user), public_path($doc->file_url));
        }
        return redirect()->route('document.index')->with('message','Successfully imported '.$doc->label);
    }

    public function show($parent,$child,Document $document,GenerateDocumentService $generateDocumentService)
    {
        $data = $generateDocumentService->execute($document,$parent,$child);

        return Inertia::render('Document/Show', [
            'datas' => $data,
            'file_name' => $document->label
        ]);
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('document.index')
            ->with('message','Successfully deleted file named '.$document->original_name);
    }
    public function update($keyword, File $file, FileUpdateRequest $request)
    {
        $doc = $file->find($keyword);
        $doc->update($request->only(
            'url',
            'main_topic_1',
            'sub_topic_2',
            'sub_topic_3',
            'sub_topic_4',
            'keyword',
            'status',
            'seo_title',
            'serp_analysis',
            'search_content',
            'content_type',
            'search_volume',
            'cpc',
        ));

        return redirect()->back()->with('message','Updated successfully.');
    }
}
