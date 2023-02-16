<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChoiceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create choices') || $this->user()->can('update choices');
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
            'goal_id' => 'required',
            'images' => 'nullable',
            'content' => 'required'
        ];
    }
}
