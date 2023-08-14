<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class WebsiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       if(auth()->check()) {
            return true;
       }
    }

    public function rules(): array
    {
        switch($this->method())
            {
            case 'POST':
                return [
                    'url' => ['required','string','max:100'],
                    'slug' => ['nullable'],
                ];
            case 'PATCH':
                return [
                    'url' => ['required','string','max:100'],
                    'slug' => ['nullable'],
                ];
            }
    }
}
