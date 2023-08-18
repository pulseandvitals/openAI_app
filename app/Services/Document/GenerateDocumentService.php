<?php

namespace App\Services\Document;

use App\Models\ImportData;

class GenerateDocumentService {

    public function execute($params)
    {
        $data = ImportData::query()
                ->with('user')
                ->select('sub_topic_2')
                ->where('user_id', $params['user_id'])
                ->get();

        $q =  collect($data)->countBy('sub_topic_2');
        return $q;
    }
}
