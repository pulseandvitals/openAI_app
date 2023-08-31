<?php

namespace App\Services\Document;

use App\Models\File;

class GenerateDocumentService {

    public function execute($params,$parent,$child)
    {
        $parent = $parent ?? null;
        $child = $child ?? null;

        $main_topic_1 = File::query()
            ->select('main_topic_1','document_id')
            ->distinct()
            ->whereNotNull(['main_topic_1'])
            ->where([
                'document_id' => $params['id'],
            ])
            ->get();

        $mtVal = $main_topic_1->first();
        $sub_topic_2 = File::query()
            ->select('sub_topic_2','document_id','main_topic_1')
            ->where('sub_topic_2' ,'!=' , $mtVal->main_topic_1)
            ->where([
                'document_id' => $params['id'],
                'main_topic_1' => $mtVal->main_topic_1
            ])
            ->distinct()
            ->whereNotNull(['sub_topic_2'])
            ->get();

        $sub_topic_3 = File::query()
            ->select('sub_topic_3','document_id','sub_topic_2')
            ->where('sub_topic_3','!=',$parent != $child ? $parent : $child)
            ->where([
                'document_id' => $params['id'],
                'sub_topic_2' => $parent != $child ? $parent : $child,
            ])
            ->distinct()
            ->whereNotNull(['sub_topic_3'])
            ->get();

        $sub_topic_4 = File::query()
            ->select('sub_topic_4','document_id','sub_topic_3')
            ->where('sub_topic_4','!=',$child)
            ->where([
                'document_id' => $params['id'],
                'sub_topic_3' => $child,
            ])
            ->distinct()
            ->whereNotNull(['sub_topic_4'])
            ->get();

        $keywords = File::query()
            ->select('keyword','document_id','id','is_completed')
            ->where([
                'document_id' => $params['id'],
                'sub_topic_3' => $child
            ])
            ->get();

        $data = [
            'main_topic_1' => $main_topic_1,
            'sub_topic_2' =>  [
                'data' => $sub_topic_2 ?? null,
                'value' => $parent != $child ? $parent : $child
            ],
            'sub_topic_3' =>  [
                'data' => $sub_topic_3 ?? null,
                'value' => $child
            ],
            'sub_topic_4' => [
                'data' => $sub_topic_4 ?? null,
                'value' => $parent != $child ? $parent : $child
            ],
            'keywords' => [
                'data' => $keywords,
            ],
        ];

        return $data;
    }
}
