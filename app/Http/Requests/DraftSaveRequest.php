<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DraftSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('draft content');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'summary' => 'nullable|string',
            'instructions' => 'nullable|string',
            'review' => 'nullable|string',
            'exercises' => 'nullable|string',
        ];
    }
}
