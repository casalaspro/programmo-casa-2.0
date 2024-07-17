<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:60|string',
            'email' => ['required', 'string', 'email', Rule::unique(User::class)->ignore($this->user)],
            'date_of_birth' => ['nullable', 'date_format:Y-m-d']
            // 'password' => 'required|max:20|string',
        ];
    }
}
