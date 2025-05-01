<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MidwifeRequest extends FormRequest
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
            'midwife_id' => 'required|string',
            'full_name' => 'required|string',
            'email' => 'required|string',
            'contact_number' => 'string',
            'specialty' => 'string',
            'work_location' => 'string',
            'address' => 'string',
        ];
    }
}
