<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DraftStoreRequest extends FormRequest
{
    public array $details;

    public function authorize(): bool
    {
        return $this->user()->can('draft content');
    }

    public function rules(): array
    {
        return [
            'type' => 'required|string',
            'parentId' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,text/plain|max:1024',
            'summary' => 'nullable|string',
            'show_me_video_url' => 'nullable|string',
            'details' => 'nullable',
        ];
    }
}
