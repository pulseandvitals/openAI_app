<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        if(Auth::check() && Auth::user()->role == 1) {
            return true;
        }
    }

    public function rules(): array
    {
        switch($this->method()) {
            case 'POST':
                $rules = [
                    'name' => 'required|max:50',
                    'email' => 'required|unique:users,email',
                    'password' => 'required',
                    'role' => 'required|in:1,0'
                ];
            case 'PATCH':
                $rules = [
                    'name' => 'required|max:50',
                    'email' => ['required','email',Rule::unique('users')->ignore($this->user)],
                    'role' => 'required|in:1,0'
                ];
            return $rules;
        }
    }
}
