<?php

namespace App\Services\Document;

use App\Models\ImportData;

class GenerateDocumentService {

    public function execute($params)
    {
        $main_topic_1 = ImportData::query()
                ->with('user')
                ->select('main_topic_1')
                ->distinct()
                ->whereNotNull(['main_topic_1'])
                ->where([
                    'document_id' => $params['id'],
                ])
                ->get();

        $sub_topic_2 = ImportData::query()
                ->with('user')
                ->select('sub_topic_2')
                ->distinct()
                ->whereNotNull(['sub_topic_2'])
                ->where([
                    'document_id' => $params['id'],
                ])
                ->get();

        $sub_topic_3 = ImportData::query()
                ->with('user')
                ->select('sub_topic_3')
                ->distinct()
                ->whereNotNull(['sub_topic_3'])
                ->where([
                    'document_id' => $params['id'],
                ])
                ->get();

        $sub_topic_4 = ImportData::query()
                ->with('user')
                ->select('sub_topic_4')
                ->distinct()
                ->whereNotNull(['sub_topic_4'])
                ->where([
                    'document_id' => $params['id'],
                ])
                ->get();

        $data = [
            'main_topic_1' => $main_topic_1,
            'sub_topic_2' => $sub_topic_2,
            'sub_topic_3' => $sub_topic_3,
            'sub_topic_4' => $sub_topic_4
        ];

        return $data;
    }
}