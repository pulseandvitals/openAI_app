<?php

namespace App\Http\Controllers;

use App\Http\Requests\Document\DocumentRequest;
use Inertia\Inertia;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Resources\DocumentResource;
use App\Services\Document\StoreDocumentService;

class DocumentController extends Controller
{

    public function index()
    {
        return Inertia::render('Document/Index', [
            'documents' => DocumentResource::collection(Document::query()
                ->with('user')
                ->orderBy('created_at','DESC')
                ->get()
                )
        ]);
    }

    public function create()
    {
        return Inertia::render('Document/Create');
    }

    public function store(DocumentRequest $request, StoreDocumentService $document)
    {
        $document->execute($request->url,auth()->id());

        return redirect()->route('document.index')->with('message','Success');
    }

    public function show(Document $document)
    {
        $filePath = public_path('documents/'.$document->user_id.'/'.$document->file_url);
            $file = fopen($filePath, 'r');
            $header = fgetcsv($file);

            $data = [];
            while ($row = fgetcsv($file)) {
                $data[] = array_combine($header, $row);
            }

        fclose($file);

        return Inertia::render('Document/Show', [
            'documents' => $data,
            'file_name' => $document->original_name
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
        //
    }
}
