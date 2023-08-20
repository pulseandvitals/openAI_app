<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Document;
use App\Models\ImportData;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\DocumentResource;
use App\Http\Requests\Document\DocumentRequest;
use App\Http\Resources\ImportDataResource;
use App\Http\Resources\UserResource;
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
            Excel::import(new DataImport($document_id,$user), public_path('documents/'.$doc->user_id.'/'.$doc->file_url));
        }

        return redirect()->route('document.index')->with('message','Successfully imported '.$doc->original_name);
    }

    public function show(Document $document, GenerateDocumentService $generateDocumentService)
    {
        $data = $generateDocumentService->execute($document);
        return Inertia::render('Document/Show', [
            'datas' => $data,
            'file_name' => $document->label
        ]);
    }

    public function edit(Document $document)
    {
        //
    }

    public function update(Request $request, Document $document)
    {
        //
    }

    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('document.index')
            ->with('message','Successfully deleted file named '.$document->original_name);
    }
}
