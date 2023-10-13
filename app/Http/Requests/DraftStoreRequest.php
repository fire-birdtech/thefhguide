<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DraftStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('draft content');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string',
            'parent_id' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,text/plain|max:1024',
            'summary' => 'nullable|string',
            'show_me_video_url' => 'nullable|string',
            'content' => 'nullable',
        ];
    }
}
