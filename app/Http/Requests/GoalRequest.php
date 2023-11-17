<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create goals') || $this->user()->can('update goals');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'project_id' => 'integer|required',
            'summary' => 'string|required',
            'show_me_video_url' => 'string|nullable',
        ];
    }
}
