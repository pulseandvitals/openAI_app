<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role == 1 ? 'Admin' : 'User',
            'email' => $this->email,
            'created' => !empty($this->created_at) ? $this->created_at->format('M, d Y H:i:s A') : null,
            'routes' => [
                'destroy' => route('user.destroy', $this),
                'edit' => route('user.edit', $this),
                'show' => route('user.show', $this)
            ],
        ];
    }
}
