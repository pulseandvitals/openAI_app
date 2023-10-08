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
            ->where([
                'document_id' => $params['id'],
                'sub_topic_3' => $child,
            ])
            ->distinct()
            ->whereNotNull(['sub_topic_4'])
            ->get(['sub_topic_4','document_id','sub_topic_3']);

        $sub_topic_4_empty = File::query()
            ->where('sub_topic_4',$child)
            ->where([
                'document_id' => $params['id'],
                'sub_topic_3' => $child,
            ])
            ->distinct()
            ->whereNotNull(['sub_topic_4'])
            ->get(['sub_topic_4','document_id','sub_topic_3']);

        $st4 = count($sub_topic_4) > 1 ? $sub_topic_4 : $sub_topic_4_empty;

        $keywords = File::query()
            ->where([
                'document_id' => $params['id'],
                'sub_topic_3' => $child
            ])
            ->get();

        $counts = File::query()
            ->where('document_id', $params['id']);

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
                'data' => $st4,
                'value' => $parent != $child ? $parent : $child
            ],
            'keywords' => [
                'data' => $keywords,
            ],
            'counts' => [
                'total' => $counts->count(),
                'completed' => $counts->where('is_article_completed',1)->count(),
                'no_urls' => $counts->orWhereNull('url')->where('document_id',$params['id'])->count()
                ]
        ];
        return $data;
    }
}
