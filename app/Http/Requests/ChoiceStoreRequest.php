<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChoiceStoreRequest extends FormRequest
{
    public int $goal_id;

    public array $details;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create choices') || $this->user()->can('update choices');
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
            'goal_id' => 'required',
            'images' => 'nullable',
            'details' => 'required',
        ];
    }
}
