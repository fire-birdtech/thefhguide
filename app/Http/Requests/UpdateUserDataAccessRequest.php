<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserDataAccessRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'receiver_id' => ['required', 'integer', 'exists:users,id'],
            'sender_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
