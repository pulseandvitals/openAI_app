<?php

namespace App\Services\Document;

use App\Models\Document;
use Illuminate\Support\Facades\URL;

class StoreDocumentService {

    public function execute($params,$id)
    {
        $file_name = rand() . '.' . $params['url']->getClientOriginalExtension();
        $params['url']->move(public_path('documents/'.auth()->id()), $file_name);
        $file_url = URL::to('documents/'.auth()->id().'/'.$file_name);
        $docs = Document::create([
            'label' => $params['label'],
            'file_url' => $file_name,
            'new_url' => $file_url,
            'original_name' => $params['url']->getClientOriginalName(),
            'user_id' => $id
        ]);
        return $docs;
    }
}
