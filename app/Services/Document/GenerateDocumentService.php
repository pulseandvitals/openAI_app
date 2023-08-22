<?php

namespace App\Services\Document;

use App\Models\ImportData;

class GenerateDocumentService {

    public function execute($params,$parent,$child)
    {
        $parent = $parent ?? null;
        $child = $child ?? null;

        $main_topic_1 = ImportData::query()
            ->select('main_topic_1','document_id')
            ->distinct()
            ->whereNotNull(['main_topic_1'])
            ->where([
                'document_id' => $params['id'],
            ])
            ->get();

        $mtVal = $main_topic_1->first();
        $sub_topic_2 = ImportData::query()
            ->select('sub_topic_2','document_id','main_topic_1')
            ->where('sub_topic_2' ,'!=' , $mtVal->main_topic_1)
            ->where([
                'document_id' => $params['id'],
                'main_topic_1' => $mtVal->main_topic_1
            ])
            ->distinct()
            ->whereNotNull(['sub_topic_2'])
            ->get();

            $sub_topic_3 = ImportData::query()
                ->select('sub_topic_3','document_id','sub_topic_2')
                ->where('sub_topic_3','!=',$child)
                ->where([
                    'document_id' => $params['id'],
                    'sub_topic_2' => $child,
                ])
                ->distinct()
                ->whereNotNull(['sub_topic_3'])
                ->get();

        $sub_topic_4 = ImportData::query()
            ->select('sub_topic_4','document_id','sub_topic_3')
            ->where('sub_topic_4','!=',$child)
            ->where([
                'document_id' => $params['id'],
                'sub_topic_3' => $child,
            ])
            ->distinct()
            ->whereNotNull(['sub_topic_4'])
            ->get();



        $data = [
            'main_topic_1' => $main_topic_1,
            'sub_topic_2' =>  $sub_topic_2 ?? null,
            'sub_topic_3' =>  $sub_topic_3 ?? null,
            'sub_topic_4' =>  $sub_topic_4 ?? null,
        ];

        return $data;
    }
}
