<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DraftPublishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('publish content');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'new_name' => 'nullable|string',
            'new_summary' => 'nullable|string',
            'new_instructions' => 'nullable|string',
            'new_resources' => 'nullable|string',
            'new_review' => 'nullable|string',
            'new_exercises' => 'nullable|string',
        ];
    }
}
