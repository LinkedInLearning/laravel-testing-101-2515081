<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrUpdateClientRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'id' => ['nullable', 'integer', 'min:1', Rule::unique('clients')->ignore($this->id)],
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('clients')->ignore($this->client->id ?? null)],
            'phone' => 'nullable|string|max:255',
            'active' => 'sometimes|same:active',
            'photo' => 'sometimes|image|max:2000'
        ];
    }
}
