<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
			'full_name' => 'required|string',
			'date_of_birth' => 'required',
			'gender' => 'required',
			'contact_number' => 'required|string',
			'email' => 'required|string',
			'medical_registration_number' => 'required|string',
			'specialty' => 'required|string',
			'years_of_experience' => 'required',
			'work_location' => 'required|string',
			'address' => 'string',
        ];
    }
}
