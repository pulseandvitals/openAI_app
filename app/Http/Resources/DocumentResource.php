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
            'created_by' => UserResource::make($this->whenLoaded('user')),
            'created' => !empty($this->created_at)
                ? $this->created_at->diffForHumans()
                : null,
            'routes' => [
                'destroy' => route('document.destroy', $this),
                'show' => route('document.show',[
                    'parent' => 'main_top_1',
                    'child' => 'null',
                    'document' => $this,
                ])
            ]
        ];
    }
}
