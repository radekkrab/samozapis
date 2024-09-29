<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecialistRequest extends FormRequest
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
        $specialistId = $this->route('specialist'); // Получаем ID специалиста из маршрута

        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:specialists,email,' . $specialistId,
            'password' => 'sometimes|required|string|min:6|confirmed',
            'role' => 'sometimes|required|string|in:specialist,admin',
        ];
    }
}
