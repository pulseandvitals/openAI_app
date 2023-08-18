<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'file_url' => $this->file_url,
            'orig_name' => $this->original_name,
            'created_by' => UserResource::make($this->whenLoaded('user')),
            'created' => !empty($this->created_at) ? $this->created_at->format('M, d Y H:i:s A') : null,
            'routes' => [
                'destroy' => route('document.destroy', $this),
                'show' => route('document.show',$this)
            ]
        ];
    }
}
