<?php

namespace App\Imports;

use App\Models\ImportData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToModel,WithHeadingRow
{

    private $document_id, $user;

    public function __construct(String $document_id, String $user) {

        $this->document_id = $document_id;
        $this->user = $user;
    }
    public function model(array $data)
    {
        return new ImportData([
            'user_id' => $this->user,
            'document_id' => $this->document_id,
            'url' => $data['web_url'],
            'position' => $data['position'],
            'status' => $data['status'],
            'main_topic_1' => $data['main_topic_1'],
            'sub_topic_2' => $data['sub_topic_2'],
            'sub_topic_3' => $data['sub_topic_3'],
            'sub_topic_4' => $data['sub_topic_4'],
            'keyword' => $data['keyword'],
            'search_volume' => $data['search_volume'],
            'cpc' => $data['cpc'],
            'str4_kw' => $data['str4_kw'],
            'seo_title' => $data['seo_title'],
            'serp_analysis' => $data['serp_analysis'],
            'search_content' => $data['search_content'],
            'content_type,' => $data['content_type'],
        ]);
    }
}
