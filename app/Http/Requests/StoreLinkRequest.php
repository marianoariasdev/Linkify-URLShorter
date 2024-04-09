<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreLinkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
            'visit_count' => 0,
            'short_url' => Str::random(8),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'original_url' => 'required|url|max:255',
            'short_url' => 'required|string|max:8',
            'visit_count' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }
}
