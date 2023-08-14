<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'token' => $this->token,
            'slug' => $this->slug,
            'created' => !empty($this->created_at) ? $this->created_at->format('M, d Y H:i:s A') : null,
            'routes' => [
                'destroy' => route('website.destroy', $this),
                'edit' => route('website.edit', $this)
            ]
         ];
    }
}
