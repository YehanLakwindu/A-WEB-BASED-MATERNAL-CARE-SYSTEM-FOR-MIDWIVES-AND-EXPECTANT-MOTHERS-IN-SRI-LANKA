<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MothersdataRequest extends FormRequest
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
			'email' => 'string',
			'address' => 'string',
			'nearest_landmark' => 'string',
			'husband_name' => 'string',
			'husband_contact' => 'string',
			'husband_occupation' => 'string',
			'stimated_delivery_date' => 'string',
			'last_menstrual_period' => 'string',
			'previous_pregnancy_history' => 'string',
			'known_medical_conditions' => 'string',
			'current_health_status' => 'string',
			'blood_type' => 'string',
			'rh_factor' => 'string',
			'chronic_illnesses' => 'string',
			'allergies' => 'string',
			'previous_surgeries' => 'string',
			'occupation' => 'string',
			'current_weigh' => 'string',
			'mother_contact_number' => 'string',
        ];
    }
}
