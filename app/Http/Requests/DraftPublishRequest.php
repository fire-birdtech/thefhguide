<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DraftPublishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('publish content');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'summary' => 'nullable|string',
            'instructions' => 'nullable|string',
            'resources' => 'nullable|string',
            'review' => 'nullable|string',
            'exercises' => 'nullable|string',
        ];
    }
}
