<?php

namespace App\Services\Document;

use App\Models\Document;
use Illuminate\Support\Facades\URL;

class StoreDocumentService {

    public function execute($params,$id)
    {
        $file_name = rand() . '.' . $params['url']->getClientOriginalExtension();
        $params['url']->move(public_path('documents/'.$id), $file_name);
        $file = 'documents/'.$id.'/'.$file_name;
        $docs = Document::create([
            'label' => $params['label'],
            'file_url' => $file,
            'user_id' => $id
        ]);
        return $docs;
    }
}
