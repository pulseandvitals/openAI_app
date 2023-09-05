<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImportDataResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'url' => $this->url ?? null,
            'position' => $this->position ?? null,
            'status' => $this->status ?? null,
            'main_topic_1' => $this->main_topic_1 ?? null,
            'sub_topic_2' => $this->sub_topic_2 ?? null,
            'sub_topic_3' => $this->sub_topic_3 ?? null,
            'sub_topic_4' => $this->sub_topic_4 ?? null,
            'keyword' => $this->keyword ?? null,
            'seo_title' => $this->seo_title ?? null,
            'serp_analysis' => $this->serp_analysis ?? null,
            'search_content' => $this->search_content ?? null,
            'content_type' => $this->content_type ?? null,
            'search_volume' => $this->search_volume ?? null,
            'is_completed' => $this->is_completed ? 1 : 0,
            'cpc' => $this->cpc ?? null,
        ];
    }
}
