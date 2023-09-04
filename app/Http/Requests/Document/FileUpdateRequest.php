<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class FileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'url' => 'required|max:100',
            'main_topic_1' => 'required|max:250',
            'sub_topic_2' => 'required|max:250',
            'sub_topic_3' => 'required|max:250',
            'sub_topic_4' => 'required|max:250',
            'keyword' => 'required|max:250',
            'status' => 'nullable',
            'seo_title' => 'nullable',
            'serp_analysis' => 'nullable',
            'search_content' => 'nullable',
            'content_type' => 'nullable',
            'search_volume' => 'nullable',
            'cpc' => 'nullable',
        ];

        return $rules;
    }
}
